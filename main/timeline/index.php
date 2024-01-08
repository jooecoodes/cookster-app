<?php
require_once("../../load_env.php");
// Replace with your GitHub username, repository name, and access token
$username = $_ENV['GITHUB_USERNAME'];
$repoName =  $_ENV['GITHUB_REPO_NAME'];
$accessToken = $_ENV['GITHUB_ADMIN_TOKEN'];

// Fetch commits from the GitHub API
$commitsUrl = "https://api.github.com/repos/{$username}/{$repoName}/commits";
$options = [
    'http' => [
        'header' => [
            "Authorization: Bearer {$accessToken}",
            "User-Agent: Awesome-App", // Replace with your app name
        ],
    ],
];
$context = stream_context_create($options);
$commits = json_decode(file_get_contents($commitsUrl, false, $context), true);

// Display the commits
if ($commits) {
    echo "<h2>Recent Commits</h2>";
    echo "<ul>";
    foreach ($commits as $commit) {
        echo "<li>";
        echo "<strong>Author:</strong> {$commit['commit']['author']['name']}<br>";
        echo "<strong>Date:</strong> {$commit['commit']['author']['date']}<br>";
        echo "<strong>Message:</strong> {$commit['commit']['message']}<br>";
        echo "</li>";
    }
    echo "</ul>";
} else {
    echo "<p>No commits found.</p>";
}

?>