<?php
// Read the file
$content = file_get_contents('app/Http/Controllers/RestaurantController.php');

// Find and replace the login method
$pattern = '/public function loginrestrunts\(Request \$request\)\s*\{\s*\$request->validate\(\[[^\]]+\]\);\s*\$restaurant = Restaurant::where[^;]+;/';
$replacement = 'public function loginrestrunts(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required|string",
        ]);

        $restaurant = Restaurant::where("email", $request->email)->first();';

$content = preg_replace($pattern, $replacement, $content, 1);

// Also fix the error message
$content = str_replace("['username' =>", "['email' =>", $content);

file_put_contents('app/Http/Controllers/RestaurantController.php', $content);
echo "Fixed!\n";
