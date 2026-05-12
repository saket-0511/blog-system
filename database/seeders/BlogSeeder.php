<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Blog;
use Carbon\Carbon;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ['Admit Card', 'Result', 'Answer Key', 'Exam Date', 'Information', 'Syllabus', 'Notification'];

        $blogs = [
            [
                'title'    => 'SSC CGL 2024 Admit Card Released - Download Now',
                'category' => 'Admit Card',
                'content'  => '<h2>SSC CGL 2024 Admit Card</h2><p>The Staff Selection Commission has released the admit card for SSC CGL 2024 Tier-1 examination. Candidates who have successfully registered for the exam can now download their hall tickets from the official website.</p><h3>How to Download</h3><ol><li>Visit the official SSC website</li><li>Click on Admit Card section</li><li>Enter your registration number and date of birth</li><li>Download and print your admit card</li></ol><h3>Exam Details</h3><ul><li>Exam Mode: Computer Based Test (CBT)</li><li>Duration: 60 minutes</li><li>Total Questions: 100</li><li>Total Marks: 200</li></ul>',
                'published_at' => Carbon::now()->subDays(1),
            ],
            [
                'title'    => 'UPSC Civil Services Result 2024 Declared',
                'category' => 'Result',
                'content'  => '<h2>UPSC Civil Services Result 2024</h2><p>The Union Public Service Commission has declared the final result for Civil Services Examination 2024. A total of 1016 candidates have been recommended for appointment.</p><h3>Topper Details</h3><p>This year\'s topper has achieved an outstanding score across all stages of the examination including Prelims, Mains, and Interview.</p><h3>How to Check Result</h3><ol><li>Go to upsc.gov.in</li><li>Click on "Written Results" section</li><li>Find Civil Services Examination 2024</li><li>Download the PDF and check your roll number</li></ol>',
                'published_at' => Carbon::now()->subDays(2),
            ],
            [
                'title'    => 'IBPS PO Answer Key 2024 Released - Raise Objections',
                'category' => 'Answer Key',
                'content'  => '<h2>IBPS PO Preliminary Answer Key 2024</h2><p>Institute of Banking Personnel Selection (IBPS) has released the provisional answer key for PO Preliminary Examination 2024. Candidates can check and raise objections if any.</p><h3>Important Dates</h3><ul><li>Answer Key Available: Today</li><li>Last Date to Raise Objection: 5 days from now</li><li>Final Answer Key: After review</li></ul><h3>How to Raise Objection</h3><p>Candidates must pay Rs. 200 per question for raising objections through online mode only.</p>',
                'published_at' => Carbon::now()->subDays(3),
            ],
            [
                'title'    => 'RRB NTPC Exam Date 2024 Announced - Check Schedule',
                'category' => 'Exam Date',
                'content'  => '<h2>RRB NTPC Exam Schedule 2024</h2><p>Railway Recruitment Board has officially announced the examination schedule for NTPC 2024. The exam will be conducted in multiple phases across different zones.</p><h3>Phase-wise Schedule</h3><table border="1" style="border-collapse:collapse;width:100%"><tr><th>Phase</th><th>Dates</th><th>Posts</th></tr><tr><td>Phase 1</td><td>March 2024</td><td>Graduate Posts</td></tr><tr><td>Phase 2</td><td>April 2024</td><td>Undergraduate Posts</td></tr></table><h3>Exam Cities</h3><p>Exams will be held in over 500 cities across India. Candidates can check their exam city allocation on the official website.</p>',
                'published_at' => Carbon::now()->subDays(4),
            ],
            [
                'title'    => 'SBI Clerk Recruitment 2024 - 8000+ Vacancies',
                'category' => 'Notification',
                'content'  => '<h2>SBI Clerk 2024 Official Notification</h2><p>State Bank of India has released the official notification for recruitment of Junior Associates (Customer Support & Sales) for 8773 vacancies.</p><h3>Vacancy Details</h3><ul><li>Total Posts: 8773</li><li>Post Name: Junior Associate</li><li>Category: Banking Jobs</li></ul><h3>Eligibility</h3><ul><li>Education: Graduation in any discipline</li><li>Age: 20-28 years</li><li>Age Relaxation: As per government rules</li></ul><h3>Selection Process</h3><ol><li>Preliminary Examination</li><li>Main Examination</li><li>Local Language Test</li></ol>',
                'published_at' => Carbon::now()->subDays(5),
            ],
            [
                'title'    => 'NEET UG 2024 Syllabus - Complete Subject-wise Topics',
                'category' => 'Syllabus',
                'content'  => '<h2>NEET UG 2024 Syllabus</h2><p>National Testing Agency has released the official syllabus for NEET UG 2024. The syllabus covers topics from Class 11 and 12 Physics, Chemistry, and Biology.</p><h3>Physics Topics</h3><ul><li>Physical World and Measurement</li><li>Kinematics</li><li>Laws of Motion</li><li>Work, Energy and Power</li><li>Gravitation</li></ul><h3>Chemistry Topics</h3><ul><li>Some Basic Concepts of Chemistry</li><li>Structure of Atom</li><li>Classification of Elements</li><li>Chemical Bonding</li></ul><h3>Biology Topics</h3><ul><li>Diversity in Living World</li><li>Structural Organisation in Animals and Plants</li><li>Cell Structure and Function</li><li>Plant Physiology</li></ul>',
                'published_at' => Carbon::now()->subDays(6),
            ],
            [
                'title'    => 'CTET July 2024 - Important Information for Candidates',
                'category' => 'Information',
                'content'  => '<h2>CTET July 2024 Information</h2><p>Central Teacher Eligibility Test (CTET) July 2024 notification has been released. Candidates aspiring to teach in Central Government schools must clear this exam.</p><h3>Paper Details</h3><ul><li><strong>Paper I:</strong> For teachers of Class I to V</li><li><strong>Paper II:</strong> For teachers of Class VI to VIII</li></ul><h3>Exam Pattern</h3><p>Both papers consist of 150 MCQ questions of 1 mark each. There is no negative marking. Minimum qualifying marks is 60% (90/150).</p><h3>Validity</h3><p>CTET certificate is valid for lifetime as per recent government guidelines.</p>',
                'published_at' => Carbon::now()->subDays(7),
            ],
            [
                'title'    => 'GATE 2025 Registration Begins - Apply Before Deadline',
                'category' => 'Notification',
                'content'  => '<h2>GATE 2025 Registration</h2><p>IIT Roorkee has started GATE 2025 online registration. Graduate Aptitude Test in Engineering (GATE) 2025 will be conducted in February 2025 for 30 papers.</p><h3>Key Dates</h3><ul><li>Registration Start: September 2024</li><li>Last Date (Without Late Fee): October 2024</li><li>Exam Dates: February 1, 2, 15, 16, 2025</li></ul><h3>Application Fee</h3><ul><li>General/OBC: Rs. 1800</li><li>SC/ST/PwD/Female: Rs. 900</li></ul>',
                'published_at' => Carbon::now()->subDays(8),
            ],
            [
                'title'    => 'UP Police Constable Result 2024 Out',
                'category' => 'Result',
                'content'  => '<h2>UP Police Constable Result 2024</h2><p>Uttar Pradesh Police Recruitment and Promotion Board (UPPRPB) has declared the result for Constable Civil Police exam 2024. More than 60,000 candidates have cleared the written exam.</p><h3>Selection Process</h3><ol><li>Written Exam (Qualified)</li><li>Physical Standard Test (PST)</li><li>Physical Efficiency Test (PET)</li><li>Document Verification</li><li>Medical Examination</li></ol><h3>Next Steps</h3><p>Qualified candidates will be called for Physical Standard Test. Admit cards for PST will be available on the official website soon.</p>',
                'published_at' => Carbon::now()->subDays(9),
            ],
            [
                'title'    => 'CAT 2024 Admit Card Download - Hall Ticket Available',
                'category' => 'Admit Card',
                'content'  => '<h2>CAT 2024 Admit Card</h2><p>Indian Institute of Management (IIM) Calcutta has released the CAT 2024 Admit Card. All registered candidates can download their hall ticket from iimcat.ac.in.</p><h3>Exam Day Instructions</h3><ul><li>Carry a valid photo ID proof</li><li>Report at exam centre 60 minutes before exam time</li><li>Rough sheets will be provided at the centre</li><li>Electronic devices are not allowed</li></ul><h3>Exam Details</h3><ul><li>Duration: 120 minutes</li><li>Sections: VARC, DILR, QA</li><li>Mode: Computer Based Test</li></ul>',
                'published_at' => Carbon::now()->subDays(10),
            ],
            [
                'title'    => 'JEE Main 2025 Syllabus Revised - Key Changes',
                'category' => 'Syllabus',
                'content'  => '<h2>JEE Main 2025 Revised Syllabus</h2><p>National Testing Agency has revised the JEE Main 2025 syllabus. Several topics have been removed based on NCERT curriculum changes. Students must check the updated syllabus carefully.</p><h3>Removed Topics from Physics</h3><ul><li>Electromagnetic Waves (some portions)</li><li>Communication Systems</li></ul><h3>Removed Topics from Chemistry</h3><ul><li>Some topics from Environmental Chemistry</li><li>Chemistry in Everyday Life (reduced)</li></ul><h3>Important Note</h3><p>Mathematics syllabus remains largely unchanged. Students are advised to download the official syllabus PDF from jeemain.nta.nic.in.</p>',
                'published_at' => Carbon::now()->subDays(11),
            ],
            [
                'title'    => 'SSC CHSL Answer Key 2024 - Download & Raise Objections',
                'category' => 'Answer Key',
                'content'  => '<h2>SSC CHSL 2024 Provisional Answer Key</h2><p>Staff Selection Commission has released the provisional answer key for CHSL (Combined Higher Secondary Level) Tier-1 Examination 2024.</p><h3>How to Check Answer Key</h3><ol><li>Visit ssc.nic.in</li><li>Click on "Answer Key" tab</li><li>Select CHSL 2024 Tier-1</li><li>Login with your credentials</li><li>View/Download your question paper and answer key</li></ol><h3>Objection Window</h3><p>Candidates can raise objections against any answer by paying Rs. 100 per question. Objections submitted without fee will not be entertained.</p>',
                'published_at' => Carbon::now()->subDays(12),
            ],
        ];

        foreach ($blogs as $blog) {
            Blog::create([
                'title'             => $blog['title'],
                'content'           => $blog['content'],
                'category'          => $blog['category'],
                'short_description' => substr(strip_tags($blog['content']), 0, 200) . '...',
                'image'             => null,
                'published_at'      => $blog['published_at'],
            ]);
        }
    }
}
