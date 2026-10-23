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
            'whatsapp' => $request->filled('whatsapp')
                ? $request->input('whatsapp')
                : null,

            'voix' => $request->filled('voix')
                ? $request->input('voix')
                : null,

            'experience' => $request->filled('experience')
                ? $request->input('experience')
                : null,

            'motivation' => $request->filled('motivation')
                ? $request->input('motivation')
                : null,
        ]);

        $validated = $request->validate(
            [
                'nom' => [
                    'required',
                    'string',
                    'max:100',
                ],

                'prenoms' => [
                    'required',
                    'string',
                    'max:150',
                ],

                'telephone' => [
                    'required',
                    'string',
                    'regex:/^[+\d\s().-]{8,20}$/',
                    function (
                        string $attribute,
                        mixed $value,
                        \Closure $fail
                    ) use ($request) {
                        if (Inscription::existeDeja(
                            (string) $request->input('nom'),
                            (string) $request->input('prenoms'),
                            (string) $value
                        )) {
                            $fail('Utilisateur déjà inscrit.');
                        }
                    },
                ],

                'whatsapp' => [
                    'nullable',
                    'string',
                    'regex:/^[+\d\s().-]{8,20}$/',
                ],

                'quartier' => [
                    'required',
                    'string',
                    'max:150',
                ],

                'deja_chorale' => [
                    'required',
                    Rule::in(['oui', 'non']),
                ],

                'voix' => [
                    'nullable',
                    'string',
                    'max:100',
                ],

                'experience' => [
                    'nullable',
                    'string',
                    'max:1000',
                ],

                'motivation' => [
                    'nullable',
                    'string',
                    'max:2000',
                ],
            ],
            [
                'nom.required' =>
                    'Veuillez saisir votre nom.',

                'nom.max' =>
                    'Le nom ne doit pas dépasser 100 caractères.',

                'prenoms.required' =>
                    'Veuillez saisir vos prénoms.',

                'prenoms.max' =>
                    'Les prénoms ne doivent pas dépasser 150 caractères.',

                'telephone.required' =>
                    'Veuillez saisir votre numéro de téléphone.',

                'telephone.regex' =>
                    'Veuillez saisir un numéro de téléphone valide.',

                'whatsapp.regex' =>
                    'Veuillez saisir un numéro WhatsApp valide.',

                'quartier.required' =>
                    'Veuillez saisir votre quartier ou résidence.',

                'quartier.max' =>
                    'Le quartier ne doit pas dépasser 150 caractères.',

                'deja_chorale.required' =>
                    'Veuillez répondre à cette question.',

                'deja_chorale.in' =>
                    'Veuillez choisir une réponse valide.',
            ]
        );

        $inscription = Inscription::create($validated);

        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Votre inscription a été enregistrée avec succès.',
                'inscription' => $inscription,
            ], 201);
        }

        return redirect()
            ->back()
            ->with('success', 'Votre inscription a été enregistrée avec succès.');
    }

    /**
     * Affiche la liste des inscriptions.
     */
    public function index(): View|JsonResponse
    {
        $inscriptions = Inscription::query()
            ->latest()
            ->get();

        if (request()->expectsJson()) {
            return response()->json([
                'inscriptions' => $inscriptions,
            ]);
        }

        return view('inscriptions.index', compact('inscriptions'));
    }

    /**
     * Affiche les détails d'une inscription.
     */
    public function show(Inscription $inscription): View|JsonResponse
    {
        if (request()->expectsJson()) {
            return response()->json([
                'inscription' => $inscription,
            ]);
        }

        return view('inscriptions.show', compact('inscription'));
    }

    /**
     * Supprime une inscription.
     */
    public function destroy(Inscription $inscription): JsonResponse|RedirectResponse
    {
        $inscription->delete();

        if (request()->expectsJson()) {
            return response()->json([
                'message' => 'Inscription supprimée avec succès.',
            ]);
        }

        return redirect()
            ->back()
            ->with('success', 'Inscription supprimée avec succès.');
    }
}
