<?php
namespace App\Traits;

use App\Models\User;
use App\Models\SystemLanguage;
use App\Services\JwtAuthService\JwtAuthService;

class Trans
{
    protected $lang;
    protected User $user;
    protected SystemLanguage $systemLanguage;

    public function __construct($language = false)
    {
        $this->user = new User();
        $this->systemLanguage = new SystemLanguage();
        $this->lang = $this->applyLanguage($language);
    }

    public function get(string $key, mixed $default = null): mixed
    {
        $segments = explode('.', $key);
        $value = $this->lang;

        foreach ($segments as $segment) {
            if (!is_array($value) || !array_key_exists($segment, $value)) {
                return $default;
            }
            $value = $value[$segment];
        }

        return $value;
    }
    
    /**
     * Apply language when user is authenticated
     * @param string $language [en, fr, de...]
     */
    private function applyLanguage($language = false)
    {
        # Check if language is set. If not, return default language.
        if ($language) {
            return require __DIR__. "/../Langs/{$language}.php";
        }
        
        # Check if user is authenticated. If not, return default language.
        if (!isset(JwtAuthService::authenticatedUser()->id)) {
            return require __DIR__ . "/../Langs/en.php";
        }
        
        # Check if user is authenticated. If yes, return user language.
        $user = $this->user->find(JwtAuthService::authenticatedUser()->id);
        $systemLanguage = $this->systemLanguage->find($user->system_language_id);
        return require __DIR__ . "/../Langs/{$systemLanguage->abbreviation}.php";
    }
}
