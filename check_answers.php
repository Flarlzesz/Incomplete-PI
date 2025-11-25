<!DOCTYPE html>
<html class="dark" lang="lv">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Check your exercises</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;700;900&display=swap" rel="stylesheet"/>
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
                    fontFamily: { display: ["Lexend", "sans-serif"] },
                }
            }
        }
    </script>
    <style> body { font-family: 'Lexend', sans-serif; } </style>
</head>

<body class="bg-background-light dark:bg-background-dark text-slate-800 dark:text-white font-display">

<!-- Popup -->
<div id="loadingPopup" class="hidden fixed inset-0 flex items-center justify-center bg-black/40 backdrop-blur-sm z-50">
    <div class="bg-white dark:bg-[#111318] border border-slate-200 dark:border-[#282e39] rounded-xl p-8 w-[380px] flex flex-col items-center gap-4 shadow-xl">
        <div class="animate-spin rounded-full h-12 w-12 border-4 border-primary border-t-transparent"></div>
        <p class="text-lg font-semibold">Your file is getting checked...</p>
        <p class="text-sm text-slate-500 dark:text-slate-400">Please wait a moment</p>
    </div>
</div>

<div class="relative flex h-auto min-h-screen w-full flex-col">
    <div class="flex min-h-screen">

        <?php include 'sidebar.php'; ?>

        <main class="flex-1 p-8 overflow-y-auto">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 w-full max-w-screen-2xl mx-auto">

                <!-- Upload section -->
                <div class="lg:col-span-4 flex flex-col bg-white dark:bg-[#111318] border border-slate-200 dark:border-[#282e39] p-6 rounded-xl gap-6 shadow-sm">

                    <h1 class="text-3xl font-bold text-slate-900 dark:text-white leading-tight">
                        Upload your solution
                    </h1>

                    <p class="text-slate-500 dark:text-slate-400 text-base">
                        Make sure that the picture is taken in good lightning and everything is visible.
                    </p>

                    <div class="border-b-2 border-primary/50"></div>

                    <form id="uploadForm" class="flex flex-col gap-6">

                        <label class="flex flex-col">
                            <span class="text-base font-medium">Choose the file</span>
                            <input name="exercise" type="file" accept=".pdf,.png,.jpg,.jpeg" required
                                class="block w-full text-sm text-slate-900 dark:text-slate-200 
                                file:mr-4 file:py-3 file:px-4 file:rounded-lg file:border-0
                                file:text-sm file:font-semibold file:bg-primary file:text-white hover:file:bg-primary/90
                                bg-white dark:bg-[#1c1f27] border border-slate-300 dark:border-[#3b4354] rounded-lg cursor-pointer">
                        </label>

                        <button
                            type="submit"
                            class="h-12 flex items-center justify-center bg-primary text-white font-bold rounded-lg hover:bg-primary/90 transition-colors">
                            Submit your file
                        </button>

                    </form>

                </div>

                <!-- Preview section -->
                <div class="lg:col-span-8 bg-white dark:bg-[#111318] border border-slate-200 dark:border-[#282e39] p-8 rounded-xl flex flex-col shadow-sm">

                    <div class="flex justify-between items-center pb-4">
                        <h2 class="text-xl font-bold">Preview</h2>
                        <button class="flex items-center gap-2 text-sm bg-slate-100 dark:bg-slate-800 px-4 py-2 rounded-lg hover:bg-slate-200 dark:hover:bg-slate-700 transition">
                            <span class="material-symbols-outlined text-base">download</span>
                            Download PDF
                        </button>
                    </div>

                    <div id="previewContent" class="lg:col-span-8 col-span-full border border-slate-200 dark:border-[#282e39] rounded-lg 
                        bg-slate-100 dark:bg-slate-900/40 
                        min-h-[600px]
                        flex items-center justify-center p-6">   
                        <div class="text-slate-500 dark:text-slate-400 text-center">
                            <p>Upload a file to see the results here.</p>
                        </div>
                    </div>

                </div>

            </div>
        </main>

    </div>
</div>

<script>
    document.getElementById('uploadForm').addEventListener('submit', async function(e) {
        e.preventDefault(); // Prevent default form submission
        
        // Show loading popup
        const popup = document.getElementById('loadingPopup');
        popup.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
        
        // Get form data
        const formData = new FormData(this);
        const fileInput = this.querySelector('input[name="exercise"]');
        
        // Check if file is selected
        if (!fileInput.files || fileInput.files.length === 0) {
            alert('Please select a file');
            popup.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
            return;
        }
        
        // Prepare form data for upload
        const uploadData = new FormData();
        uploadData.append('exercise_file', fileInput.files[0]);
        
        try {
            // Make the API call
            const response = await fetch('https://incompletepi.app.n8n.cloud/webhook-test/6be70c37-ce50-4ac9-a4d0-8d43fd9a2684', {
                method: 'POST',
                body: uploadData
            });
            
            const result = await response.json();
            
            // Update preview with response
            const previewContent = document.getElementById('previewContent');
            if (result && result[0] && result[0].output) {
                previewContent.innerHTML = result[0].output;
            } else {
                previewContent.innerHTML = '<div class="text-red-500">Error: Invalid response from server</div>';
            }
            
        } catch (error) {
            console.error('Error:', error);
            const previewContent = document.getElementById('previewContent');
            previewContent.innerHTML = '<div class="text-red-500">Error: Failed to check exercises. Please try again.</div>';
        } finally {
            // Hide loading popup
            popup.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }
    });
</script>

</body>
</html>
