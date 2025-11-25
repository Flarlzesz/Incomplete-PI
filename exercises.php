<!DOCTYPE html>
<html class="dark" lang="lv">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Math AI exercises</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;700;900&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#135bec",
                        "background-light": "#f4f7f9",
                        "background-dark": "#101622",
                    },
                    fontFamily: {
                        "display": ["Lexend", "sans-serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Lexend', sans-serif;
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark text-slate-800 dark:text-white font-display">

    <!-- Popup -->
    <div id="loadingPopup" class="hidden fixed inset-0 flex items-center justify-center bg-black/40 backdrop-blur-sm z-50">
        <div class="bg-white dark:bg-[#111318] border border-slate-200 dark:border-[#282e39] rounded-xl p-8 w-[380px] flex flex-col items-center gap-4 shadow-xl">
            <div class="animate-spin rounded-full h-12 w-12 border-4 border-primary border-t-transparent"></div>
            <p class="text-slate-900 dark:text-white text-lg font-semibold text-center">Your file is generating...</p>
            <p class="text-slate-500 dark:text-slate-400 text-sm text-center">Please wait a few seconds!</p>
        </div>
    </div>

    <div class="relative flex h-auto min-h-screen w-full flex-col">
        <div class="flex min-h-screen">
            <?php include 'sidebar.php'; ?>
            <main class="flex-1 p-8 overflow-y-auto">

                <main class="flex-grow w-full max-w-screen-2xl mx-auto p-4 sm:p-6 lg:p-10">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 h-full">

                        <!-- From page.. -->
  
                        <div class="lg:col-span-4 flex flex-col gap-6">
                            <div class="flex flex-col gap-3">
                                <p class="text-slate-900 dark:text-white text-4xl font-black leading-tight tracking-[-0.033em]">
                                    Generate exercises
                                </p>
                                <p class="text-slate-500 dark:text-[#9da6b9] text-base font-normal leading-normal">
                                    Choose the topic and exercise amount. If you need to add something specific, prompt it in the notes section!
                                </p>
                            </div>
                            <form id="exerciseForm">
                                <div class="flex flex-col gap-4">
                                    <label class="flex flex-col w-full">
                                        <p class="text-slate-800 dark:text-white text-base font-medium leading-normal pb-2">Topic</p>
                                        <input name="tema" class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-slate-900 dark:text-white focus:outline-0 focus:ring-2 focus:ring-primary/50 border-slate-300 dark:border-[#3b4354] bg-white dark:bg-[#1c1f27] focus:border-primary dark:focus:border-primary h-14 placeholder:text-slate-400 dark:placeholder:text-[#9da6b9] p-[15px] text-base font-normal leading-normal" 
                                            type="text" 
                                            value="" 
                                            required/>
                                    </label>

                                    <label class="flex flex-col w-full">
                                        <p class="text-slate-800 dark:text-white text-base font-medium leading-normal pb-2">Exercise amount</p>
                                        <input name="uzdevumu_skaits" class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-slate-900 dark:text-white focus:outline-0 focus:ring-2 focus:ring-primary/50 border-slate-300 dark:border-[#3b4354] bg-white dark:bg-[#1c1f27] focus:border-primary dark:focus:border-primary h-14 placeholder:text-slate-400 dark:placeholder:text-[#9da6b9] p-[15px] text-base font-normal leading-normal" 
                                            type="number" 
                                            value="" 
                                            required/>
                                    </label>

                                    <label class="flex flex-col w-full">
                                        <p class="text-slate-800 dark:text-white text-base font-medium leading-normal pb-2">Notes (*not required)</p>
                                        <textarea name="piezimes" class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-slate-900 dark:text-white focus:outline-0 focus:ring-2 focus:ring-primary/50 border-slate-300 dark:border-[#3b4354] bg-white dark:bg-[#1c1f27] focus:border-primary dark:focus:border-primary min-h-36 placeholder:text-slate-400 dark:placeholder:text-[#9da6b9] p-[15px] text-base font-normal leading-normal"></textarea>
                                    </label>

                                    <div class="flex flex-col sm:flex-row flex-1 gap-3 flex-wrap justify-start pt-2">
                                        <button type="submit" class="flex flex-1 min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 px-5 bg-primary text-white text-base font-bold leading-normal tracking-[0.015em] hover:bg-primary/90 transition-colors">
                                            <span class="truncate">Generate</span>
                                        </button>
                                    </div>
                                </div>
                            </form>  
                            
                        </div>

                        <!-- Preview section -->
                        <div class="lg:col-span-8 bg-white dark:bg-[#111318] rounded-xl border border-slate-200 dark:border-[#282e39] p-6 sm:p-8 flex flex-col">
                            <div class="flex-grow flex flex-col gap-6">
                                <div class="flex justify-between items-center">
                                    <h3 class="text-xl font-bold text-slate-900 dark:text-white">Preview</h3>
                                    <button class="flex items-center gap-2 h-10 px-4 rounded-lg text-slate-600 dark:text-slate-300 bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 text-sm font-medium transition-colors">
                                        <span class="material-symbols-outlined text-base">download</span>
                                        <span>Download PDF</span>
                                    </button>
                                </div>

                                <div class="flex-grow bg-slate-100 dark:bg-background-dark rounded-lg flex items-center justify-center border border-slate-200 dark:border-[#282e39] p-4">
                                    <div id="previewContent" class="w-full h-full max-w-2xl bg-white dark:bg-slate-900/50 shadow-lg p-8 text-slate-800 dark:text-slate-200 aspect-[8.5/11]">
                                        <div class="space-y-4 text-slate-500 dark:text-slate-400 text-center">
                                            <p>Fill out the form and click "Generate" to see your exercises here.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </main>

            </main>
        </div>
    </div>

    <script>
        document.getElementById('exerciseForm').addEventListener('submit', async function(e) {
            e.preventDefault(); // Prevent default form submission
            
            // Show loading popup
            const popup = document.getElementById('loadingPopup');
            popup.classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
            
            // Get form data
            const formData = new FormData(this);
            const data = {
                tema: formData.get('tema'),
                uzdevumu_skaits: formData.get('uzdevumu_skaits'),
                piezimes: formData.get('piezimes'),
                location: 'uzdevumi'
            };
            
            try {
                // Make the API call
                const response = await fetch('https://incompletepi.app.n8n.cloud/webhook-test/ef9611a3-d925-490a-aa22-35b1db218212', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                });
                
                const result = await response.json();
                
                // Update preview with response
                const previewContent = document.getElementById('previewContent');
                if (result && result[0] && result[0].output) {
                    previewContent.innerHTML = '<div class="space-y-4">' + result[0].output + '</div>';
                } else {
                    previewContent.innerHTML = '<div class="space-y-4 text-red-500">Error: Invalid response from server</div>';
                }
                
            } catch (error) {
                console.error('Error:', error);
                const previewContent = document.getElementById('previewContent');
                previewContent.innerHTML = '<div class="space-y-4 text-red-500">Error: Failed to generate exercises. Please try again.</div>';
            } finally {
                // Hide loading popup
                popup.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            }
        });
    </script>

</body>
</html>
