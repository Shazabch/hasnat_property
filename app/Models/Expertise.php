<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\UseContentSections;
use App\Traits\UseQuickFacts;
use App\Traits\UsePublishedStatus;
use App\Traits\UseSchema;

class Expertise extends Model
{
    use HasFactory, SoftDeletes,UseContentSections,UseQuickFacts,UsePublishedStatus,UseSchema;

    protected $fillable = [
        'title',
        'slug',
        'image',
        'image_alt',
        'short_description',
        'status',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'published_at',
        'created_by_user',
        'updated_by_user',
        'icon',
        'tagline',
        'order',
        'show_on_dashboard',
        'flip_card_description',
        'detail_icon',
    ];

    public function scopeOrdered($query)
    {
        return $query->orderBy('order','asc');
    }

    public function scopeShowOnDashboard($query)
    {
        return $query->where('show_on_dashboard',1);
    }

    // on deleting content section, delete the image
    public static function boot()
    {
        parent::boot();

        static::deleting(function ($expertise) {
                deleteFile($expertise->image);
        });
    }

    public static function technologies()
    {
        $data= [
            [
                'title' => 'Endoscopy',
                'description' => '',
                'icon' => 'front/assets/img/plus.svg',
                'items' => [
                    'Improved accuracy and precision',
                    'Reduced surgical time',
                    'Enhanced visualization of anatomy',
                    'Reduced tissue damage and scarring',
                    'Less blood loss and reduced risk of complications',
                    'Enhanced functional outcomes',
                    'Better overall well-being',

                ],
            ],
          

            [
                'title' => '⁠Robotic spine procedures',
                'description' => '',
                'icon' => 'front/assets/img/plus.svg',
                'items' => [
                    'Enhanced accuracy and precision',
                    'Improved visualization and navigation',
                    'Reduced radiation exposure',
                    'Minimally invasive procedures',
                    'Faster recovery times',
                    'Reduced blood loss and complications',
                    'Improved outcomes and patient satisfaction',

                ],
            ],

            [
                'title' => 'Vital sign monitoring',
                'description' => '',
                'icon' => 'front/assets/img/plus.svg',
                'items' => [
                    'Enhanced Spinal Stability',
                    'Increased Fusion Success',
                    'Reduced Post-Operative Pain',
                    'Accelerated Recovery',
                    'Lower Complication Risk',
                ],
            ],
        

            [
                'title' => '⁠Anaesthesia monitoring',
                'description' => '',
                'icon' => 'front/assets/img/plus.svg',
                'items' => [
                   'Real-time vital sign tracking',
                   'Predictive analytics for complications',
                   'Personalized anesthesia management',
                   'Enhanced patient safety',
                   'Improved outcomes',
                ],
            ],

            [
                'title' => '⁠Artificial discs (cervical and lumbar) for disc replacement',
                'description' => '',
                'icon' => 'front/assets/img/plus.svg',

                'items' => [
                    'Relieves pain and pressure on surrounding nerves',
                    'Maintains spinal flexibility and motion',
                    'Reduces need for bone grafts and fusion',
                    'Minimizes risk of adjacent segment disease',
                    'Faster recovery compared to fusion surgery',
                ],
            ],
            
            [
                'title' => '⁠Spinal cages and inter-body devices for spinal fusion',
                'description' => '',
                'icon' => 'front/assets/img/plus.svg',
                'items' => [
                   'Improved spinal stability',
                   'Enhanced fusion rates',
                   'Reduced post-operative pain',
                   'Faster recovery',
                   'Minimized risk of complications',
                ],
            ],
            
            [
                'title' => 'Pedicle screws and rods for spinal stabilisation',
                'description' => '',
                'icon' => 'front/assets/img/plus.svg',
                'items' => [
                    'Improved spinal alignment and stability',
                    'Higher fusion rates for optimal healing',
                    'Significant reduction in post-surgical pain',
                    'Faster return to normal activities',
                    'Minimized risk of surgical complications',
                ],
            ],
            
            [
                'title' => 'Biodegradable implants for reducing long-term complications',
                'description' => '',
                'icon' => 'front/assets/img/plus.svg',
                'items' => [
                    'Improved spinal alignment',
                    'Reduced risk of future degeneration',
                    'Enhanced spinal balance',
                    'Increased strength and stability',
                    'Better overall quality of life',
                ],
            ],
       
           
           
            
            [
                'title' => 'Electromyography (EMG)',
                'description' => '',
                'icon' => 'front/assets/img/plus.svg',
                'items' => [
                    'Intraoperative monitoring during spinal surgery',
                    'Identification of nerve damage during surgery',
                    'Guided nerve repair or grafting',
                    'Monitoring of muscle function during orthopedic surgery',
                    'Reduced risk of surgical complications',

                ],
            ],
          
            
            [
                'title' => 'Somatosensory evoked potentials (SSEP)',
                'description' => '',
                'icon' => 'front/assets/img/plus.svg',
                'items' => [
                    'Improved patient outcomes',
                    'Enhanced diagnostic accuracy',
                    'Reduced healthcare costs',
                    'Increased patient satisfaction',
                    'Better understanding of neurological function',

                ],
            ],
           

           
            
        ];

        return collect($data);
    }
}
