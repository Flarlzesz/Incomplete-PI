<!DOCTYPE html>
<html class="dark" lang="en">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Incomplete PI Dashboard</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.0/chart.umd.min.js"></script>
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;700;900&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
<style>
    .material-symbols-outlined {
        font-variation-settings:
        'FILL' 0,
        'wght' 400,
        'GRAD' 0,
        'opsz' 24
    }
</style>
<script id="tailwind-config">
    tailwind.config = {
        darkMode: "class",
        theme: {
            extend: {
                colors: {
                    "primary": "#135bec",
                    "background-light": "#f6f6f8",
                    "background-dark": "#101622",
                },
                fontFamily: {
                    "display": ["Lexend", "sans-serif"]
                },
                borderRadius: {"DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px"},
            },
        },
    }
</script>
</head>
<body class="bg-background-light dark:bg-background-dark font-display text-gray-800 dark:text-gray-200">
<div class="flex min-h-screen">
<aside class="w-64 flex-shrink-0 bg-white dark:bg-[#1C212E] p-4">
<div class="flex flex-col gap-8">
<div class="flex items-center gap-3 px-2">
<div class="flex items-center justify-center size-10 bg-primary rounded-lg text-white">
<span class="material-symbols-outlined text-2xl">school</span>
</div>
<h1 class="text-gray-900 dark:text-white text-lg font-bold">Incomplete PI</h1>
</div>

<nav class="flex flex-col gap-2">
<a class="flex items-center gap-3 px-3 py-2 rounded-lg bg-primary/20 dark:bg-primary/20 text-primary dark:text-white" href="#">
<span class="material-symbols-outlined">analytics</span>
<p class="text-sm font-medium">Dashboard</p>
</a>

<a href="exercises.php" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-background-dark">
<span class="material-symbols-outlined">task_alt</span>
<p class="text-sm font-medium">Exercises</p>
</a>

<a href="check_answers.php" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-background-dark">
<span class="material-symbols-outlined">task</span>
<p class="text-sm font-medium">Check My Answers</p>
</a>

<a href="weak_points.php" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-background-dark">
<span class="material-symbols-outlined">psychology</span>
<p class="text-sm font-medium">Weak Points</p>
</a>
</nav>
</div>
</aside>

<main class="flex-1 p-8 overflow-y-auto">
<div class="max-w-4xl mx-auto">
<header class="mb-8">
<h1 class="text-4xl font-black leading-tight tracking-[-0.033em] text-gray-900 dark:text-white">Hello, Albert!</h1>
<p class="text-gray-500 dark:text-gray-400 text-base font-normal leading-normal mt-2">Great to see you again. Let's continue learning!</p>
</header>

<section class="mb-8">
<div class="rounded-xl bg-white dark:bg-[#1C212E] p-6 shadow-sm">
<h2 class="text-gray-900 dark:text-white text-xl font-bold mb-4">Your Progress Overview</h2>
<div class="h-72">
<canvas id="progressChart"></canvas>
</div>
</div>
</section>

<h2 class="text-gray-900 dark:text-white text-[22px] font-bold leading-tight tracking-[-0.015em] mb-4">Your Progress Summary</h2>
<section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
<div class="flex flex-col gap-2 rounded-xl p-6 bg-white dark:bg-[#1C212E] border border-gray-200 dark:border-[#3B4354] shadow-sm">
<p class="text-gray-700 dark:text-gray-300 text-base font-medium leading-normal">Solved Exercises</p>
<p class="text-gray-900 dark:text-white tracking-light text-3xl font-bold leading-tight">15</p>
</div>
<div class="flex flex-col gap-2 rounded-xl p-6 bg-white dark:bg-[#1C212E] border border-gray-200 dark:border-[#3B4354] shadow-sm">
<p class="text-gray-700 dark:text-gray-300 text-base font-medium leading-normal">Average Accuracy</p>
<p class="text-gray-900 dark:text-white tracking-light text-3xl font-bold leading-tight">84%</p>
</div>
<div class="flex flex-col gap-2 rounded-xl p-6 bg-white dark:bg-[#1C212E] border border-gray-200 dark:border-[#3B4354] shadow-sm">
<p class="text-gray-700 dark:text-gray-300 text-base font-medium leading-normal">Completed Topics</p>
<p class="text-gray-900 dark:text-white tracking-light text-3xl font-bold leading-tight">3</p>
</div>
</section>

<h2 class="text-gray-900 dark:text-white text-[22px] font-bold leading-tight tracking-[-0.015em] mb-4">Your Weak Points</h2>
<section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
<?php

// Google Sheet info

require_once "getWeakPoints.php";

$weakPoints = new getWeakPoints();
$data = $weakPoints->getWeakPoints();

foreach ($data as $weak_point) {
    echo "
    <div class='flex flex-col gap-3 rounded-xl p-6 bg-white dark:bg-[#1C212E] border border-gray-200 dark:border-[#3B4354] shadow-sm hover:shadow-md transition-shadow'>
        <div class='flex items-center gap-3'>
            <div class='flex items-center justify-center size-10 bg-red-100 dark:bg-red-900/30 rounded-lg'>
                <span class='material-symbols-outlined text-red-600 dark:text-red-400'>priority_high</span>
            </div>
            <p class='text-gray-900 dark:text-white text-lg font-bold leading-tight'>$weak_point</p>
        </div>
      <a href='weak_points.php?tema=$weak_point' 
        class='flex items-center justify-center h-9 px-4 rounded-lg bg-primary text-white hover:bg-primary/90 text-sm font-medium transition-colors'>
          Practice Now
      </a>

    </div>
    ";
}

?>
</section>
</div>
</main>
</div>

<script>
// Stats
const ctx = document.getElementById('progressChart').getContext('2d');

const exerciseData = [75, 82, 78, 88, 85, 90, 83, 87, 92, 85, 88, 80, 84, 86, 89];

const progressChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: Array.from({length: 15}, (_, i) => `${i + 1}`),
        datasets: [{
            label: '% Correct',
            data: exerciseData,
            borderColor: '#135bec',
            backgroundColor: 'rgba(19, 91, 236, 0.1)',
            tension: 0.4,
            fill: true,
            pointRadius: 4,
            pointHoverRadius: 6,
            pointBackgroundColor: '#135bec',
            pointBorderColor: '#fff',
            pointBorderWidth: 2
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false
            },
            tooltip: {
                backgroundColor: 'rgba(0, 0, 0, 0.8)',
                padding: 12,
                titleColor: '#fff',
                bodyColor: '#fff',
                borderColor: '#135bec',
                borderWidth: 1
            }
        },
        scales: {
            y: {
                beginAtZero: false,
                min: 70,
                max: 100,
                title: {
                    display: true,
                    text: '% for each submitted solution',
                    color: document.documentElement.classList.contains('dark') ? '#9ca3af' : '#6b7280',
                    font: {
                        size: 12,
                        weight: 'bold'
                    }
                },
                ticks: {
                    color: document.documentElement.classList.contains('dark') ? '#9ca3af' : '#6b7280',
                    callback: function(value) {
                        return value + '%';
                    }
                },
                grid: {
                    color: document.documentElement.classList.contains('dark') ? 'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.1)'
                }
            },
            x: {
                title: {
                    display: true,
                    text: 'Exercise Nr.',
                    color: document.documentElement.classList.contains('dark') ? '#9ca3af' : '#6b7280',
                    font: {
                        size: 12,
                        weight: 'bold'
                    }
                },
                ticks: {
                    color: document.documentElement.classList.contains('dark') ? '#9ca3af' : '#6b7280'
                },
                grid: {
                    color: document.documentElement.classList.contains('dark') ? 'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.1)'
                }
            }
        }
    }
});
</script>
</body>
</html>