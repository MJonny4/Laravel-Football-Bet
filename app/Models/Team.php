<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'name',
        'short_name',
        'logo_url',
        'country',
        'active'
    ];
    
    protected $casts = [
        'active' => 'boolean'
    ];
    
    /**
     * Get the team's logo URL with fallback
     */
    public function getLogoUrlAttribute($value): string
    {
        if ($value) {
            return $value;
        }
        
        // Fallback to GitHub repository based on team name
        $teamSlug = $this->getTeamSlugForLogo();
        return "https://raw.githubusercontent.com/luukhopman/football-logos/main/premier-league/{$teamSlug}.png";
    }
    
    /**
     * Get the team slug for logo filename
     */
    private function getTeamSlugForLogo(): string
    {
        // Convert team name to slug format used in the repository
        $name = strtolower($this->name);
        
        // Handle special cases
        $replacements = [
            'real madrid' => 'real-madrid',
            'atletico madrid' => 'atletico-madrid',
            'manchester united' => 'manchester-united',
            'manchester city' => 'manchester-city',
            'tottenham hotspur' => 'tottenham',
            'crystal palace' => 'crystal-palace',
            'west ham united' => 'west-ham',
            'brighton & hove albion' => 'brighton',
            'nottingham forest' => 'nottingham-forest',
            'afc bournemouth' => 'bournemouth',
            'sheffield united' => 'sheffield-united',
            'luton town' => 'luton-town',
        ];
        
        if (isset($replacements[$name])) {
            return $replacements[$name];
        }
        
        // Default: replace spaces with hyphens
        return str_replace(' ', '-', $name);
    }
    
    /**
     * Check if team has a custom logo URL
     */
    public function hasCustomLogo(): bool
    {
        return !empty($this->attributes['logo_url']);
    }
}
