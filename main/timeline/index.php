<?php 
   <?php
   // Replace with your GitHub username, repository name, and access token
   $username = 'your-username';
   $repoName = 'your-repository';
   $accessToken = 'your-access-token';
 
   // Fetch repository information
   $repoUrl = "https://api.github.com/repos/{$username}/{$repoName}";
   $options = [
     'http' => [
       'header' => "Authorization: Bearer {$accessToken}",
     ],
   ];
   $context = stream_context_create($options);
   $repoInfo = json_decode(file_get_contents($repoUrl, false, $context), true);
 
   if ($repoInfo) {
     echo "<p><strong>Repository:</strong> {$repoInfo['full_name']}</p>";
     echo "<p><strong>Description:</strong> {$repoInfo['description'] ?? 'No description'}</p>";
     echo "<p><strong>Stars:</strong> {$repoInfo['stargazers_count']}</p>";
     echo "<p><strong>Forks:</strong> {$repoInfo['forks_count']}</p>";
     echo "<p><strong>Watchers:</strong> {$repoInfo['watchers_count']}</p>";
 
     // Fetch recent commits
     $commitsUrl = "https://api.github.com/repos/{$username}/{$repoName}/commits";
     $commits = json_decode(file_get_contents($commitsUrl, false, $context), true);
 
     if ($commits) {
       echo "<h2>Recent Commits</h2>";
       echo "<ul>";
       foreach ($commits as $commit) {
         echo "<li>{$commit['commit']['author']['name']} - {$commit['commit']['message']}</li>";
       }
       echo "</ul>";
     } else {
       echo "<p>No commits found.</p>";
     }
   } else {
     echo "<p>Error fetching repository information.</p>";
   }

?>