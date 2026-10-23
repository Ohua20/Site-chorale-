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
        $request->merge([
            'whatsapp'   => $request->filled('whatsapp') ? $request->input('whatsapp') : null,
            'voix'       => $request->filled('voix') ? $request->input('voix') : null,
            'experience' => $request->filled('experience') ? $request->input('experience') : null,
            'motivation' => $request->filled('motivation') ? $request->input('motivation') : null,
        ]);

        $validated = $request->validate(
            [
                'nom'          => ['required', 'string', 'max:100'],
                'prenoms'      => ['required', 'string', 'max:150'],
                'telephone'    => [
                    'required',
                    'string',
                    'regex:/^[+\d\s().-]{8,20}$/',
                    function (string $attribute, mixed $value, \Closure $fail) use ($request) {
                        if (Inscription::existeDeja(
                            (string) $request->input('nom'),
                            (string) $request->input('prenoms'),
                            (string) $value
                        )) {
                            $fail('Utilisateur déjà inscrit');
                        }
                    },
                ],
                'whatsapp'     => ['nullable', 'string', 'regex:/^[+\d\s().-]{8,20}$/'],
                'quartier'     => ['required', 'string', 'max:150'],
                'deja_chorale' => ['required', Rule::in(['oui', 'non'])],
                'voix'         => [
                    'required_if:deja_chorale,oui',
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
                'telephone.unique'      => 'Utilisateur déjà inscrit',
                'whatsapp.regex'        => 'Veuillez saisir un numéro WhatsApp valide.',
                'quartier.required'     => 'Veuillez saisir votre quartier ou résidence.',
                'deja_chorale.required' => 'Veuillez répondre à cette question.',
                'voix.required_if'      => 'Veuillez sélectionner votre voix.',
                'motivation.max'        => 'La motivation ne doit pas dépasser 300 caractères.',
            ]
        );

        $dejaChorale = $validated['deja_chorale'] === 'oui';

        Inscription::create([
            'nom'          => trim($validated['nom']),
            'prenoms'      => trim($validated['prenoms']),
            'telephone'    => trim($validated['telephone']),
            'whatsapp'     => filled($validated['whatsapp'] ?? null)
                ? trim($validated['whatsapp'])
                : null,
            'quartier'     => trim($validated['quartier']),
            'deja_chorale' => $dejaChorale,

            // La voix n'est enregistrée que si la personne a déjà appartenu à une chorale
            'voix'         => $dejaChorale ? $validated['voix'] : null,

            'experience'   => $validated['experience'] ?? null,
            'motivation'   => filled($validated['motivation'] ?? null)
                ? trim($validated['motivation'])
                : null,
        ]);

        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Inscription réussie',
            ], 201);
        }

        return redirect()
            ->route('formulaire')
            ->with('success', 'Inscription réussie');
    }
}
