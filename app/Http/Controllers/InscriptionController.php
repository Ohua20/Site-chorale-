<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class InscriptionController extends Controller
{
    /**
     * Affiche le formulaire d'inscription.
     */
    public function create(): View
    {
        return view('formulaire');
    }

    /**
     * Enregistre une demande d'inscription.
     */
    public function store(Request $request): JsonResponse|RedirectResponse
    {
        // Les champs facultatifs vides deviennent null
        $request->merge([
            'whatsapp'   => $request->filled('whatsapp') ? $request->input('whatsapp') : null,
            'voix'       => $request->filled('voix') ? $request->input('voix') : null,
            'experience' => $request->filled('experience') ? $request->input('experience') : null,
            'motivation' => $request->filled('motivation') ? $request->input('motivation') : null,
        ]);

        // Utilisateur déjà inscrit (même nom, mêmes prénoms, même téléphone)
        if (Inscription::existeDeja(
            (string) $request->input('nom'),
            (string) $request->input('prenoms'),
            (string) $request->input('telephone')
        )) {
            if ($request->expectsJson()) {
                return response()->json([
                    'deja_inscrit' => true,
                    'message'      => 'Utilisateur déjà inscrit',
                ], 409);
            }

            return back()
                ->withInput()
                ->with('deja_inscrit', true);
        }

        $validated = $request->validate(
            [
                'nom'          => ['required', 'string', 'max:100'],
                'prenoms'      => ['required', 'string', 'max:150'],
                'telephone'    => ['required', 'string', 'regex:/^[+\d\s().-]{8,20}$/'],
                'whatsapp'     => ['nullable', 'string', 'regex:/^[+\d\s().-]{8,20}$/'],
                'quartier'     => ['required', 'string', 'max:150'],
                'deja_chorale' => ['required', Rule::in(['oui', 'non'])],
                'voix'         => [
                    Rule::requiredIf(fn () => $request->input('deja_chorale') === 'oui'),
                    'nullable',
                    Rule::in(['soprano', 'alto', 'tenor', 'basse']),
                ],
                'experience'   => [
                    'nullable',
                    Rule::in(['aucune', 'moins-1-an', '1-3-ans', '3-5-ans', 'plus-5-ans']),
                ],
                'motivation'   => ['nullable', 'string', 'max:300'],
            ],
            [
                'nom.required'          => 'Veuillez saisir votre nom.',
                'prenoms.required'      => 'Veuillez saisir vos prénoms.',
                'telephone.required'    => 'Veuillez saisir votre numéro de téléphone.',
                'telephone.regex'       => 'Veuillez saisir un numéro de téléphone valide.',
                'whatsapp.regex'        => 'Veuillez saisir un numéro WhatsApp valide.',
                'quartier.required'     => 'Veuillez saisir votre quartier ou résidence.',
                'deja_chorale.required' => 'Veuillez répondre à cette question.',
                'deja_chorale.in'       => 'Veuillez répondre par oui ou par non.',
                'voix.required'         => 'Veuillez sélectionner votre voix.',
                'voix.in'               => 'La voix sélectionnée n\'est pas valide.',
                'experience.in'         => 'L\'expérience sélectionnée n\'est pas valide.',
                'motivation.max'        => 'La motivation ne doit pas dépasser 300 caractères.',
            ]
        );

        // "oui" / "non" devient true / false pour la base de données
        $validated['deja_chorale'] = $validated['deja_chorale'] === 'oui';

        // Pas de voix si la personne n'a jamais chanté en chorale
        if (! $validated['deja_chorale']) {
            $validated['voix'] = null;
        }

        Inscription::create($validated);

        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Inscription enregistrée.',
            ], 201);
        }

        return redirect()
            ->route('inscription.create')
            ->with('success', 'Inscription enregistrée.');
    }
}
