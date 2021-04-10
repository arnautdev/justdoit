<?php

namespace App\Models;

use App\Traits\UserIdFilterTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LifeCirclePartition extends Model
{
    use HasFactory, UserIdFilterTrait;

    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'userId',
        'lifeCircleId',
        'progressPercent',
    ];

    /**
     * @return array
     */
    public function getLifeCirclePartitionOptions()
    {
        return [
            1 => [
                'title' => 'Здоровье',
                'description' => 'енергия, самочувствие, оздоровление',
            ],
            2 => [
                'title' => 'Финансъ',
                'description' => 'доход, разход, актив, пасив',
            ],
            3 => [
                'title' => 'Карьера',
                'description' => 'навъки, место работъ, карьернъй рост',
            ],
            4 => [
                'title' => 'Личностнъй рост',
                'description' => 'саморазвитие обучение',
            ],
            5 => [
                'title' => 'Духовност',
                'description' => 'вера, творчество, искуство',
            ],
            6 => [
                'title' => 'Отдъх',
                'description' => 'хобби, путешествия, чт книг, сон',
            ],
            7 => [
                'title' => 'Онтношения',
                'description' => 'любовь, отношения с женой',
            ],
            8 => [
                'title' => 'Семья',
                'description' => 'дети, родители, сестра, братья',
            ]
        ];
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lifeCircle()
    {
        return $this->belongsTo(LifeCircle::class, 'lifeCircleId', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(Client::class, 'userId', 'id');
    }
}
