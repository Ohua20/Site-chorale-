<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    use HasFactory;

    /**
     * Nom de la table associée au modèle.
     */
    protected $table = 'inscriptions';

    /**
     * Champs autorisés lors de l'enregistrement.
     */
    protected $fillable = [
        'nom',
        'prenoms',
        'telephone',
        'whatsapp',
        'quartier',
        'deja_chorale',
        'voix',
        'experience',
        'motivation',
    ];

    /**
     * Conversion automatique des champs.
     */
    protected function casts(): array
    {
        return [
            'deja_chorale' => 'boolean',
        ];
    }

    /**
     * Indique si une inscription existe déjà
     * pour le même nom, les mêmes prénoms et le même téléphone.
     */
    public static function existeDeja(string $nom, string $prenoms, string $telephone): bool
    {
        $nom = mb_strtolower(trim($nom), 'UTF-8');
        $prenoms = mb_strtolower(trim($prenoms), 'UTF-8');
        $telephoneChiffres = preg_replace('/\D+/', '', $telephone);

        if ($nom === '' || $prenoms === '' || $telephoneChiffres === '') {
            return false;
        }

        return static::query()
            ->whereRaw('LOWER(TRIM(nom)) = ?', [$nom])
            ->whereRaw('LOWER(TRIM(prenoms)) = ?', [$prenoms])
            ->get(['telephone'])
            ->contains(function (self $inscription) use ($telephoneChiffres) {
                return preg_replace('/\D+/', '', $inscription->telephone) === $telephoneChiffres;
            });
    }
}
