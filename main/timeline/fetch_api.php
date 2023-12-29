<?php
require_once("../../load_env.php");
session_start();
$userCategory = (isset($_SESSION['usercategory'])) ? $_SESSION['usercategory'] : "category is not set";
if (isset($_SESSION['userId']) && $userCategory == 'admin') {
    echo $_ENV['GITHUB_ADMIN_TOKEN'];

    // Replace with your GitHub username, repository name, and access token
    $username = $_ENV['GITHUB_USERNAME'];
    $repoName = $_ENV['GITHUB_REPO_NAME'];
    $accessToken = $_ENV['GITHUB_ADMIN_TOKEN'];

    // Fetch repository information using cURL
    $repoUrl = "https://api.github.com/repos/{$username}/{$repoName}";
    $ch = curl_init($repoUrl);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Authorization: Bearer {$accessToken}",
        "User-Agent: your-username",
    ]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    $repoInfo = json_decode($response, true);
    curl_close($ch);

    if ($repoInfo) {
        echo "<p><strong>Repository:</strong> {$repoInfo['full_name']}</p>";
        echo "<p><strong>Description:</strong> " . ($repoInfo['description'] ?? 'No description') . "</p>";
        echo "<p><strong>Stars:</strong> {$repoInfo['stargazers_count']}</p>";
        echo "<p><strong>Forks:</strong> {$repoInfo['forks_count']}</p>";
        echo "<p><strong>Watchers:</strong> {$repoInfo['watchers_count']}</p>";

        // Fetch recent commits using cURL
        $commitsUrl = "https://api.github.com/repos/{$username}/{$repoName}/commits";
        $ch = curl_init($commitsUrl);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer {$accessToken}",
            "User-Agent: your-username",
        ]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $commitsResponse = curl_exec($ch);
        $commits = json_decode($commitsResponse, true);
        curl_close($ch);

        if ($commits) {
            echo "<h2>Recent Commits</h2>";
            echo "<ul>";
            foreach ($commits as $commit) {
                echo "<li>";
                echo "<strong>SHA:</strong> {$commit['sha']}<br>";
                echo "<strong>Author:</strong> {$commit['commit']['author']['name']}<br>";
                echo "<strong>Date:</strong> {$commit['commit']['author']['date']}<br>";
                echo "<strong>Message:</strong> {$commit['commit']['message']}<br>";
                echo "</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>No commits found.</p>";
        }
    } else {
        echo "<p>Error fetching repository information.</p>";
    }
} else {
    echo "You're not authorized to access this page or login";
}
