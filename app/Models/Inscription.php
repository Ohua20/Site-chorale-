<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    /**
     * Nom de la table.
     */
    protected $table = 'inscriptions';

    /**
     * Champs pouvant être remplis par Inscription::create().
     * Ils correspondent aux champs validés dans le contrôleur.
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
     * Conversion des types.
     * Le contrôleur transforme "oui" / "non" en true / false.
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
