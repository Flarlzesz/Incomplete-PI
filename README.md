# Incomplete PI Documentation

### Links:

In the provided code, the webhooks are set active in n8n, so in testing cases trying to run the code everything should work! The vector database is made in Pinecone. There is a demo calculation provided below as a image for testing case in the Source code link.

- Website: https://incomplete-pi.onrender.com
- Pitch: https://youtu.be/6yMk_bEkKSs
- Source code: https://github.com/Flarlzesz/Incomplete-PI

It is a personalized AI math assistant that generates exercises based on Latvian optimal level maths, gives feedback on the solution, knows your weak spots in maths and makes you exercises based on them.

## Progress Dashboard

Displays a detailed performance graph showing "% Average Submitted Solution" across exercises which in a way acts as a motivator for the student.
Tracks progress over time (showing 15 exercises in the example).
Summary statistics including:
- Solved Exercises (15)
- Average Accuracy (84%)
- Completed Topics (3)
- Exercise Generation

Allows users to select specific math topics and specify the number of exercises needed.
Includes an optional notes field for customization (e.g., "Include word problems, no equations with two variables...").
Generates practice worksheets in PDF format.
Strictly follows the exercise creation based on a vector database that has offical Latvian documantation about Optimal level maths.
All of the generated exercises get appended to spreadsheet.
## Solution Checking

- Enables students to upload photos of their completed work that gets checked.
- Provides feedback on submitted solutions.
- When submiting a image of a solution to an exercise, AI automatically decides which exercise this solution resembles and based on that information checks if the students solution is correct. If it is not, then AI analyzes the mistakes the student did and adds to weak_points spreadsheet.
- Weak Points Identification.
- Creates targeted worksheets focusing on areas where the student struggles, using the weak_points spreadsheet.
- Generates downloadable PDF.
# 
Using our solution, we can bring ease to parents minds, giving them basically a private maths teacher for their kids. Furthermore, it costs a lot to privately educate a student on a specific subject, so this would be the cheapest route. They could also track their progress on learning and weak points in maths. Teachers in class can not give all attention to a specific person, so it also makes the students benefit too in a way that they can have a private teacher next to them. And teachers could use this as a exercise generator and a helpful tool in grading.
