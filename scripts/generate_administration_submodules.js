/**
 * EDUSYS PRO - ADMINISTRATION MODULE SUBMODULES GENERATOR
 * Generates tailored, domain-specific UI, authentic Indian CBSE records,
 * KPIs, filters, and tables for all remaining 16 submodules in administration.
 */

const fs = require('fs');
const path = require('path');

const ADMIN_DIR = path.resolve(__dirname, '../prototype/modules/administration');

const submodulesData = {
  // 1. session-calendar.php
  'session-calendar.php': {
    title: 'Session Calendar',
    desc: 'Annual term breakdown, exam windows, instructional periods, and compliance milestones for 2024-2025',
    kpi1: { title: "Instructional Days", val: "224 Working Days", trend: "Exceeds CBSE Minimum (220)", icon: "bi-calendar3-week-fill", color: "kpi-primary" },
    kpi2: { title: "Academic Terms", val: "2 Terms", trend: "Term 1 (Apr-Sep) & Term 2 (Oct-Mar)", icon: "bi-diagram-2-fill", color: "kpi-info" },
    kpi3: { title: "Exam Windows", val: "4 Windows", trend: "PT-1, Mid-Term, PT-2, Pre-Board", icon: "bi-pencil-square", color: "kpi-warning" },
    kpi4: { title: "Working Saturdays", val: "12 Days", trend: "1st & 3rd Saturdays for Cl 9-12", icon: "bi-clock-history", color: "kpi-success" },
    filterPlaceholder: "Search milestone, term, event title...",
    filterOptions: ["All Milestones", "Term 1: Foundational (Apr - Sep)", "Term 2: Board & Annual (Oct - Mar)", "Examination Windows", "Institutional Holidays & Vacations"],
    filterOptionName: "Academic Term",
    statusFilterOptions: ["All Status", "Completed Milestone", "Active / Upcoming", "Scheduled", "Board Tentative"],
    headers: ["Milestone ID", "Academic Milestone Title", "Academic Term", "Applicable Wings", "Key Deliverables", "Duration / Span", "Start Date", "Status"],
    rows: [
      { c1: "CAL-2024-01", c2: "Academic Session 2024-25 Commencement", sub: "Orientation Assembly & Textbook Distribution", c3: "Term 1", c4: "All Grades (Nursery to 12)", c5: "Timetable Rollout, House Allocation", c6: "Day 1 Opening", c7: "01 Apr 2024", badge: "badge-active", status: "Completed" },
      { c1: "CAL-2024-02", c2: "Periodic Test 1 (PT-1) Assessment Window", sub: "Formative Unit Evaluations (25 Marks)", c3: "Term 1", c4: "Classes 1 to 12", c5: "Question Papers, Answer Sheet Audit", c6: "7 Working Days", c7: "15 Jul 2024", badge: "badge-active", status: "Completed" },
      { c1: "CAL-2024-03", c2: "Mid-Term / Half-Yearly Examinations", sub: "Summative Board Pattern Exams (80 Marks)", c3: "Term 1", c4: "Classes 6 to 12", c5: "Centralized Seating, Board Pattern Papers", c6: "12 Working Days", c7: "16 Sep 2024", badge: "badge-active", status: "Completed" },
      { c1: "CAL-2024-04", c2: "Term 1 PTM & Comprehensive Report Card", sub: "Parent Consultation & Evaluation Sheets", c3: "Term 1", c4: "All Grades (Nursery to 12)", c5: "Offline Report Cards & Teacher Feedback", c6: "1 Full Day", c7: "05 Oct 2024", badge: "badge-active", status: "Completed" },
      { c1: "CAL-2024-05", c2: "Term 2 Instructional Cycle Commencement", sub: "Post-Autumn Syllabus Acceleration", c3: "Term 2", c4: "All Grades (Nursery to 12)", c5: "Practical Lab Projects, Science Fair", c6: "Instructional Block", c7: "07 Oct 2024", badge: "badge-active", status: "In Progress" },
      { c1: "CAL-2024-06", c2: "Periodic Test 2 (PT-2) Assessment Window", sub: "Cumulative Pre-Final Formative Exam", c3: "Term 2", c4: "Classes 1 to 9 & 11", c5: "Syllabus 80% Coverage", c6: "7 Working Days", c7: "02 Dec 2024", badge: "badge-pending", status: "Scheduled" },
      { c1: "CAL-2024-07", c2: "Pre-Board Examination 1 (Classes 10 & 12)", sub: "Full CBSE Board Pattern Mock Examination", c3: "Term 2", c4: "Senior Secondary (10 & 12)", c5: "Sample Paper Roster, Flying Squad", c6: "12 Working Days", c7: "06 Jan 2025", badge: "badge-pending", status: "Scheduled" },
      { c1: "CAL-2024-08", c2: "CBSE Annual Board Exams Commencement", sub: "Class 10 & 12 Official CBSE Board Exams", c3: "Term 2", c4: "Classes 10 & 12", c5: "Admit Cards, External Center Allocation", c6: "45 Calendar Days", c7: "15 Feb 2025", badge: "badge-pending", status: "Board Tentative" }
    ]
  },

  // 2. class-subject-mapping.php
  'class-subject-mapping.php': {
    title: 'Class-Subject Mapping',
    desc: 'Curriculum allocation matrix: linking academic grades, CBSE subject codes, weekly period quotas, and lab hours',
    kpi1: { title: "Mapped Subjects", val: "74 Allocations", trend: "Curriculum Synchronized", icon: "bi-diagram-3-fill", color: "kpi-primary" },
    kpi2: { title: "Mandatory Core", val: "42 Subjects", trend: "Languages, Math, Science, SST", icon: "bi-check2-circle", color: "kpi-success" },
    kpi3: { title: "Elective Baskets", val: "18 Baskets", trend: "Senior Sec Specializations", icon: "bi-collection-fill", color: "kpi-info" },
    kpi4: { title: "Lab Practical Subjects", val: "14 Subjects", trend: "Physics, Chem, Bio, CS, AI", icon: "bi-mortarboard", color: "kpi-warning" },
    filterPlaceholder: "Search grade, subject code, subject title...",
    filterOptions: ["All Grades", "Class 12 (Senior Secondary)", "Class 11 (Senior Secondary)", "Class 10 (Secondary)", "Class 9 (Secondary)", "Classes 6-8 (Middle Wing)", "Classes 1-5 (Primary Wing)"],
    filterOptionName: "Grade / Wing",
    statusFilterOptions: ["All Status", "Mapped & Active", "Curriculum Approved", "Elective Choice", "Under Review"],
    headers: ["Mapping Code", "Grade & Stream", "Subject Code & Name", "Subject Category", "Weekly Periods", "Theory / Lab Ratio", "HOD Faculty Incharge", "Status"],
    rows: [
      { c1: "MAP-12-042", c2: "Class 12 - Science (PCM)", sub: "Senior Secondary", c3: "042 &bull; Physics (Theory & Lab)", c4: "Mandatory Core", c5: "6 Periods / Week", c6: "70% Th + 30% Pr", c7: "Dr. Alok Verma", badge: "badge-active", status: "Active" },
      { c1: "MAP-12-043", c2: "Class 12 - Science (PCM)", sub: "Senior Secondary", c3: "043 &bull; Chemistry (Theory & Lab)", c4: "Mandatory Core", c5: "6 Periods / Week", c6: "70% Th + 30% Pr", c7: "Dr. Sunita Kapoor", badge: "badge-active", status: "Active" },
      { c1: "MAP-12-041", c2: "Class 12 - Science (PCM)", sub: "Senior Secondary", c3: "041 &bull; Mathematics", c4: "Mandatory Core", c5: "7 Periods / Week", c6: "80% Th + 20% Int", c7: "Mr. Rajiv Narang", badge: "badge-active", status: "Active" },
      { c1: "MAP-12-083", c2: "Class 12 - Science (PCM)", sub: "Senior Secondary", c3: "083 &bull; Computer Science (Python)", c4: "Elective Basket A", c5: "5 Periods / Week", c6: "70% Th + 30% Pr", c7: "Mr. Vikramaditya Sen", badge: "badge-active", status: "Active" },
      { c1: "MAP-12-055", c2: "Class 12 - Commerce", sub: "Senior Secondary", c3: "055 &bull; Accountancy", c4: "Mandatory Core", c5: "6 Periods / Week", c6: "80% Th + 20% Pr", c7: "Mrs. Radhika Iyer", badge: "badge-active", status: "Active" },
      { c1: "MAP-10-086", c2: "Class 10 - Secondary", sub: "Secondary Wing", c3: "086 &bull; Science (Phy/Chem/Bio)", c4: "Mandatory Core", c5: "7 Periods / Week", c6: "80% Th + 20% Int", c7: "Dr. Alok Verma", badge: "badge-active", status: "Active" },
      { c1: "MAP-10-041", c2: "Class 10 - Secondary", sub: "Secondary Wing", c3: "041 &bull; Mathematics Standard", c4: "Mandatory Core", c5: "7 Periods / Week", c6: "80% Th + 20% Int", c7: "Mrs. Sunita Kaul", badge: "badge-active", status: "Active" },
      { c1: "MAP-08-018", c2: "Class 8 - Middle Wing", sub: "Middle Wing", c3: "018 &bull; French 3rd Language", c4: "Language Elective", c5: "3 Periods / Week", c6: "80% Th + 20% Int", c7: "Mr. Deepak Rawat", badge: "badge-active", status: "Active" }
    ]
  },

  // 3. subject-groups.php
  'subject-groups.php': {
    title: 'Subject Groups',
    desc: 'CBSE subject combinations, stream elective baskets, compulsory language pairs, and vocational electives',
    kpi1: { title: "Subject Groups", val: "8 Combinations", trend: "CBSE Affiliated Baskets", icon: "bi-layers-fill", color: "kpi-primary" },
    kpi2: { title: "Science Stream Combos", val: "2 Baskets", trend: "PCM & PCB Specialization", icon: "bi-radioactive", color: "kpi-success" },
    kpi3: { title: "Commerce Combos", val: "2 Baskets", trend: "With & Without Applied Maths", icon: "bi-cash-coin", color: "kpi-info" },
    kpi4: { title: "Skill Electives", val: "4 NEP Vocational", trend: "AI, Financial Markets, Coding", icon: "bi-laptop", color: "kpi-warning" },
    filterPlaceholder: "Search group code, title, stream...",
    filterOptions: ["All Stream Groups", "Senior Secondary Science (PCM/PCB)", "Senior Secondary Commerce", "Senior Secondary Humanities", "Secondary Core (9-10)", "Middle Wing Languages"],
    filterOptionName: "Stream Group",
    statusFilterOptions: ["All Status", "Active Group", "Quota Full", "Open for Enrollment", "Archived"],
    headers: ["Group Code", "Subject Group Title", "Academic Wing / Stream", "Compulsory Core Subjects", "Elective Basket Options", "Max Capacity", "Enrolled", "Status"],
    rows: [
      { c1: "GRP-11-PCM", c2: "Senior Secondary Science (PCM Group)", sub: "Engineering & Physical Sciences Track", c3: "Senior Secondary", c4: "English Core, Physics, Chemistry, Mathematics", c5: "CS (083) / Physical Ed (048) / Economics (030)", c6: "80 Students", c7: "78 Enrolled", badge: "badge-active", status: "Active" },
      { c1: "GRP-11-PCB", c2: "Senior Secondary Science (PCB Group)", sub: "Medical & Life Sciences Track", c3: "Senior Secondary", c4: "English Core, Physics, Chemistry, Biology", c5: "Psychology (037) / Physical Ed (048) / Biotech (045)", c6: "40 Students", c7: "38 Enrolled", badge: "badge-active", status: "Active" },
      { c1: "GRP-11-COM1", c2: "Commerce with Applied Mathematics", sub: "Finance, Actuarial & Business Analytics", c3: "Senior Secondary", c4: "English Core, Accountancy, Business Studies, Economics", c5: "Applied Mathematics (241) / Computer Science", c6: "45 Students", c7: "42 Enrolled", badge: "badge-active", status: "Active" },
      { c1: "GRP-11-COM2", c2: "Commerce with Entrepreneurship", sub: "Trade, Marketing & Corporate Track", c3: "Senior Secondary", c4: "English Core, Accountancy, Business Studies, Economics", c5: "Entrepreneurship (066) / Physical Education", c6: "45 Students", c7: "40 Enrolled", badge: "badge-active", status: "Active" },
      { c1: "GRP-11-HUM", c2: "Humanities & Liberal Arts Basket", sub: "Civil Services, Law & Public Policy Track", c3: "Senior Secondary", c4: "English Core, History, Political Science, Economics", c5: "Psychology (037) / Sociology (039) / Legal Studies (074)", c6: "40 Students", c7: "36 Enrolled", badge: "badge-active", status: "Active" },
      { c1: "GRP-10-CBSE", c2: "Secondary Board Core Curriculum (Class 10)", sub: "Mandatory All-India Secondary Examination", c3: "Secondary Wing", c4: "English Lang, Hindi Course-A, Maths Std, Science, SST", c5: "Information Technology (402) / AI (417)", c6: "180 Students", c7: "180 Enrolled", badge: "badge-active", status: "Active" },
      { c1: "GRP-08-3LANG", c2: "Middle School 3-Language Formula (Class 8)", sub: "National Education Policy Language Grid", c3: "Middle Wing", c4: "English (1st Lang), Hindi (2nd Lang)", c5: "Sanskrit (022) / French (018) / German (020)", c6: "140 Students", c7: "140 Enrolled", badge: "badge-active", status: "Active" },
      { c1: "GRP-VOC-AI", c2: "NEP 2020 Vocational Skill Elective", sub: "Future Skills & Coding Foundation", c3: "Classes 9 to 12", c4: "Artificial Intelligence (417), Data Science", c5: "Hand-on Lab Practicals in Atal Tinkering Lab", c6: "120 Students", c7: "115 Enrolled", badge: "badge-active", status: "Active" }
    ]
  },

  // 4. houses-clubs.php
  'houses-clubs.php': {
    title: 'Houses & Clubs',
    desc: 'Inter-house governance, house master appointments, student council leadership, and co-curricular hobby clubs',
    kpi1: { title: "Student Houses", val: "4 Houses", trend: "Ashoka, Tagore, Shivaji, Raman", icon: "bi-shield-shaded", color: "kpi-primary" },
    kpi2: { title: "House Leader", val: "Tagore House", trend: "340 Points (Running Trophy)", icon: "bi-trophy-fill", color: "kpi-warning" },
    kpi3: { title: "Hobby Clubs", val: "12 Active Clubs", trend: "Robotics, Coding, Debate, Eco", icon: "bi-palette-fill", color: "kpi-success" },
    kpi4: { title: "Total Enrolments", val: "1,420 Students", trend: "100% Student Participation", icon: "bi-people-fill", color: "kpi-info" },
    filterPlaceholder: "Search house name, club title, mentor...",
    filterOptions: ["All Categories", "Student Houses (Inter-House)", "STEM & Innovation Clubs", "Performing & Visual Arts", "Literary & Public Speaking", "Eco & Community Outreach"],
    filterOptionName: "Category",
    statusFilterOptions: ["All Status", "Active & Chartered", "Championship Leader", "Recruiting Members", "Seasonal"],
    headers: ["Entity Code", "House / Club Title & Theme", "Category", "Faculty Master / Mentor", "Student Captain / Lead", "Active Members", "House / Club Color", "Status"],
    rows: [
      { c1: "HOU-ASHOKA", c2: "Ashoka House (The Lions of Valor)", sub: "Motto: Courage, Truth & Righteousness", c3: "Student House", c4: "Dr. Alok Verma (House Master)", c5: "Rohan Gupta (House Captain)", c6: "370 Students", c7: "Crimson Red (#dc2626)", badge: "badge-active", status: "Active (310 Pts)" },
      { c1: "HOU-TAGORE", c2: "Tagore House (The Poets of Wisdom)", sub: "Motto: Knowledge, Culture & Harmony", c3: "Student House", c4: "Mrs. Radhika Iyer (House Master)", c5: "Diya Patel (House Captain)", c6: "370 Students", c7: "Royal Blue (#2563eb)", badge: "badge-active", status: "Leader (340 Pts)" },
      { c1: "HOU-SHIVAJI", c2: "Shivaji House (The Warriors of Honor)", sub: "Motto: Gallantry, Duty & Sacrifice", c3: "Student House", c4: "Mr. Rajiv Narang (House Master)", c5: "Harpreet Singh (House Captain)", c6: "370 Students", c7: "Saffron Yellow (#eab308)", badge: "badge-active", status: "Active (295 Pts)" },
      { c1: "HOU-RAMAN", c2: "Raman House (The Pioneers of Science)", sub: "Motto: Innovation, Discovery & Vision", c3: "Student House", c4: "Dr. Sunita Kapoor (House Master)", c5: "Ananya Iyer (House Captain)", c6: "372 Students", c7: "Emerald Green (#16a34a)", badge: "badge-active", status: "Active (325 Pts)" },
      { c1: "CLB-ROBOTICS", c2: "Atal Robotics & AI Innovation Club", sub: "Autonomous Bot Battles & IoT Projects", c3: "STEM Club", c4: "Mr. Vikramaditya Sen", c5: "Reyansh Joshi (President)", c6: "65 Students", c7: "Cyan Blue (#06b6d4)", badge: "badge-active", status: "Active" },
      { c1: "CLB-DEBATE", c2: "Kalam Parliamentary Debating Society", sub: "Model United Nations & British Parliamentary", c3: "Literary Club", c4: "Mrs. Meenakshi Soni", c5: "Zara Khan (Secretary)", c6: "48 Students", c7: "Purple (#9333ea)", badge: "badge-active", status: "Active" },
      { c1: "CLB-ECO", c2: "Prakriti Eco & Climate Warriors Club", sub: "Organic Garden, Waste Segregation & Solar", c3: "Eco Club", c4: "Mrs. Shalini Verma", c5: "Kabir Mehta (Junior Lead)", c6: "85 Students", c7: "Leaf Green (#15803d)", badge: "badge-active", status: "Active" },
      { c1: "CLB-CODING", c2: "Turing CodeCraft & Web Developers Club", sub: "Python, Web Apps, Cyber Security & CTF", c3: "STEM Club", c4: "Mr. Kunal Bansal", c5: "Aarav Sharma (Lead Coder)", c6: "72 Students", c7: "Navy Blue (#1e3a8a)", badge: "badge-active", status: "Active" }
    ]
  },

  // 5. working-days.php
  'working-days.php': {
    title: 'Working Days & Hours',
    desc: 'Instructional day calendar, daily bell schedule, period duration, recess intervals, and assembly timings',
    kpi1: { title: "Instructional Days", val: "224 Days", trend: "Full Academic Session", icon: "bi-calendar-check", color: "kpi-primary" },
    kpi2: { title: "Teaching Periods", val: "8 Periods / Day", trend: "40 Mins Each + Zero Period", icon: "bi-stopwatch", color: "kpi-info" },
    kpi3: { title: "School Timings", val: "08:00 AM - 02:15 PM", trend: "6 Hours 15 Mins Daily", icon: "bi-clock-fill", color: "kpi-success" },
    kpi4: { title: "Recess Break", val: "30 Minutes", trend: "11:00 AM to 11:30 AM", icon: "bi-cup-hot", color: "kpi-warning" },
    filterPlaceholder: "Search shift code, day title, period...",
    filterOptions: ["All Shift Schedules", "Regular Summer Shift (Apr - Oct)", "Winter Shift (Nov - Feb)", "Examination Day Shift (08:30 - 12:30)", "Pre-Primary Half-Day Shift"],
    filterOptionName: "Shift Schedule",
    statusFilterOptions: ["All Status", "Active Default", "Seasonal Schedule", "Examination Preset", "Draft"],
    headers: ["Shift Code", "Schedule Title & Day Type", "Applicable Grades", "Arrival Time", "Assembly & Zero Period", "Period Duration", "Dispersal Time", "Status"],
    rows: [
      { c1: "SFT-REG-01", c2: "Regular School Timings (Mon to Fri)", sub: "Standard 8-Period Instructional Day", c3: "Classes 1 to 12", c4: "07:55 AM Gates Close", c5: "08:00 AM - 08:30 AM (Assembly)", c6: "40 Mins &bull; 8 Periods", c7: "02:15 PM Dispersal", badge: "badge-active", status: "Active Default" },
      { c1: "SFT-PRE-02", c2: "Pre-Primary Foundation Shift (Mon to Fri)", sub: "Early Childhood Play & Learning", c3: "Nursery, LKG, UKG", c4: "08:30 AM Gates Close", c5: "08:30 AM - 09:00 AM (Circle Time)", c6: "30 Mins &bull; 6 Periods", c7: "12:30 PM Dispersal", badge: "badge-active", status: "Active Default" },
      { c1: "SFT-SAT-03", c2: "Senior Secondary Saturday Session", sub: "Board Remedial & JEE/NEET Foundation", c3: "Classes 9 to 12 (1st & 3rd Sat)", c4: "08:00 AM Gates Close", c5: "08:00 AM - 08:15 AM (Briefing)", c6: "50 Mins &bull; 4 Double Labs", c7: "01:00 PM Dispersal", badge: "badge-active", status: "Active Preset" },
      { c1: "SFT-WIN-04", c2: "Winter Shift Timings (Dense Fog Protocol)", sub: "Government Cold Wave Reschedule", c3: "All Grades (Nursery to 12)", c4: "08:55 AM Gates Close", c5: "09:00 AM - 09:20 AM (In-Class)", c6: "35 Mins &bull; 8 Periods", c7: "02:45 PM Dispersal", badge: "badge-pending", status: "Seasonal (Nov-Jan)" },
      { c1: "SFT-EXM-05", c2: "Board & Term Examination Shift", sub: "Exam Days Only (Reading & Writing)", c3: "Classes 6 to 12", c4: "08:15 AM Gates Close", c5: "08:30 AM - 08:45 AM (Reading)", c6: "3 Hours Continuous Exam", c7: "12:00 PM Dispersal", badge: "badge-active", status: "Exam Preset" },
      { c1: "SFT-PTM-06", c2: "Parent-Teacher Meeting Saturday Shift", sub: "Classroom Parent Consultation Slots", c3: "All Grades (Nursery to 12)", c4: "08:15 AM Teachers In", c5: "08:30 AM First Slot Opens", c6: "10-Min Slots &bull; 48 Classrooms", c7: "01:30 PM Close", badge: "badge-active", status: "PTM Preset" },
      { c1: "SFT-SPR-07", c2: "After-School Sports Academy Session", sub: "Coaching in Football, Cricket, Tennis, Swimming", c3: "Registered Squad Athletes", c4: "02:30 PM Assembly", c5: "Warm-up & Physical Conditioning", c6: "90 Mins Coaching Drills", c7: "04:30 PM Bus Departure", badge: "badge-active", status: "Active Preset" },
      { c1: "SFT-CLB-08", c2: "Zero Period Club & Activity Block", sub: "Every Wednesday 7th & 8th Period", c3: "Classes 4 to 10", c4: "In Regular Day", c5: "Robotics, Music, Dance, Karate", c6: "80 Mins Combined Lab", c7: "02:15 PM Standard", badge: "badge-active", status: "Active Preset" }
    ]
  },

  // 6. holidays.php
  'holidays.php': {
    title: 'Holidays & Vacations',
    desc: 'Gazetted public holidays, restricted cultural festivals, seasonal vacations, and educational board recesses',
    kpi1: { title: "Annual Holidays", val: "28 Gazetted Days", trend: "Government & Board Approved", icon: "bi-calendar2-heart-fill", color: "kpi-primary" },
    kpi2: { title: "Summer Vacation", val: "45 Days", trend: "18 May to 01 Jul 2024", icon: "bi-sun-fill", color: "kpi-warning" },
    kpi3: { title: "Winter Vacation", val: "10 Days", trend: "30 Dec 2024 to 08 Jan 2025", icon: "bi-snow", color: "kpi-info" },
    kpi4: { title: "National Days", val: "3 Sovereign Days", trend: "Republic, Independence, Gandhi", icon: "bi-flag-fill", color: "kpi-success" },
    filterPlaceholder: "Search holiday title, gazette notification, date...",
    filterOptions: ["All Holidays", "National Gazetted Holidays", "Major Festive Vacations", "Summer & Winter Recesses", "Restricted / Discretionary Leaves"],
    filterOptionName: "Holiday Category",
    statusFilterOptions: ["All Status", "Mandatory Holiday", "Vacation Recess", "Restricted Day", "Completed"],
    headers: ["Holiday Code", "Holiday / Vacation Title", "Holiday Category", "Start Date", "End Date", "Duration", "Gazette Notification Ref", "Status"],
    rows: [
      { c1: "HOL-2024-01", c2: "Mahavir Jayanti", sub: "Jain Religious Observance", c3: "Gazetted Festival", c4: "21 Apr 2024", c5: "21 Apr 2024", c6: "1 Day (Sunday)", c7: "DoE Circular #948", badge: "badge-active", status: "Completed" },
      { c1: "HOL-2024-02", c2: "Buddha Purnima", sub: "Buddhist Holiday", c3: "Gazetted Festival", c4: "23 May 2024", c5: "23 May 2024", c6: "1 Day (Thursday)", c7: "DoE Circular #952", badge: "badge-active", status: "Completed" },
      { c1: "HOL-2024-03", c2: "Annual Summer Vacation 2024", sub: "Post-Term 1 Instructional Recess", c3: "School Vacation", c4: "18 May 2024", c5: "01 Jul 2024", c6: "45 Days", c7: "Annual Academic Cal #2024", badge: "badge-active", status: "Completed" },
      { c1: "HOL-2024-04", c2: "Independence Day (78th National Day)", sub: "Celebration Assembly & Flag Hoisting", c3: "National Holiday", c4: "15 Aug 2024", c5: "15 Aug 2024", c6: "1 Day (Ceremony Held)", c7: "MHA Order #842", badge: "badge-active", status: "Completed" },
      { c1: "HOL-2024-05", c2: "Mahatma Gandhi Jayanti", sub: "Father of Nation & Swachhata Diwas", c3: "National Holiday", c4: "02 Oct 2024", c5: "02 Oct 2024", c6: "1 Day (Wednesday)", c7: "Govt of India Gazette #102", badge: "badge-active", status: "Completed" },
      { c1: "HOL-2024-06", c2: "Dussehra & Vijayadashami Break", sub: "Navratri & Durga Puja Festive Holidays", c3: "Festive Break", c4: "11 Oct 2024", c5: "13 Oct 2024", c6: "3 Days", c7: "CBSE Notification #491", badge: "badge-active", status: "Completed" },
      { c1: "HOL-2024-07", c2: "Diwali & Govardhan Puja Holidays", sub: "Deepawali Festival of Lights", c3: "Festive Break", c4: "31 Oct 2024", c5: "03 Nov 2024", c6: "4 Days", c7: "State Gazette #912", badge: "badge-active", status: "Upcoming" },
      { c1: "HOL-2024-08", c2: "Guru Nanak Jayanti (Gurpurab)", sub: "Prakash Utsav Holiday", c3: "Gazetted Festival", c4: "15 Nov 2024", c5: "15 Nov 2024", c6: "1 Day (Friday)", c7: "Govt of India Gazette #114", badge: "badge-active", status: "Upcoming" }
    ]
  },

  // 7. events-calendar.php
  'events-calendar.php': {
    title: 'School Events Calendar',
    desc: 'Master institutional timeline, co-curricular fixtures, inter-school tournaments, and administrative dates',
    kpi1: { title: "Total Events", val: "48 Fixtures", trend: "2024-25 Season Roster", icon: "bi-calendar3", color: "kpi-primary" },
    kpi2: { title: "Competitions", val: "14 Inter-School", trend: "Debate, MUN, Robotics, Sports", icon: "bi-trophy", color: "kpi-warning" },
    kpi3: { title: "Parent Functions", val: "6 Mega Events", trend: "Sports Day, Annual Day, PTMs", icon: "bi-people", color: "kpi-success" },
    kpi4: { title: "Active Month", val: "November 2024", trend: "14 Live Operational Events", icon: "bi-lightning-charge", color: "kpi-info" },
    filterPlaceholder: "Search event, venue, faculty coordinator...",
    filterOptions: ["All Event Categories", "Academic Olympiads & Exhibitions", "Sports Competitions & Heats", "Cultural Festivals & Dramas", "Parent-Teacher Conferences", "Educational Excursions"],
    filterOptionName: "Event Domain",
    statusFilterOptions: ["All Status", "Confirmed", "Planning Stage", "Completed", "Postponed"],
    headers: ["Event Code", "Event Title & Description", "Event Category", "Participating Grades", "Venue & Ground", "Event Incharge", "Scheduled Date", "Status"],
    rows: [
      { c1: "EVT-2024-1108", c2: "Class 10 & 12 Pre-Board Diagnostic PTM", sub: "Term 1 Assessment Review & Board Roadmap", c3: "PTM Session", c4: "Secondary & Sr Sec Wings", c5: "Rooms 201 to 216", c6: "Dean Academics", c7: "08 Nov 2024 (08:30 AM)", badge: "badge-active", status: "Slots Open" },
      { c1: "EVT-2024-1114", c2: "Children's Day Gala Carnival 2024", sub: "Magic Show, Fun Fair, Games & Music", c3: "Cultural Carnival", c4: "All Students & Parents", c5: "Central School Grounds", c6: "Cultural Committee", c7: "14 Nov 2024 (09:00 AM)", badge: "badge-active", status: "Confirmed" },
      { c1: "EVT-2024-1118", c2: "National Science Centre Eco-Excursion", sub: "Interactive Science & Planetarium Demos", c3: "School Excursion", c4: "Middle Wing (Classes 6-8)", c5: "National Science Centre, Pragati", c6: "HOD Science", c7: "18 Nov 2024 (08:00 AM)", badge: "badge-active", status: "Confirmed" },
      { c1: "EVT-2024-1122", c2: "24th Annual Athletics Championship 2024", sub: "Track & Field, Relays, March Past & Medals", c3: "Sports & Athletics", c4: "All 4 Student Houses", c5: "Main Athletic Stadium Ground", c6: "Director Physical Ed", c7: "22 Nov 2024 (08:30 AM)", badge: "badge-active", status: "Confirmed" },
      { c1: "EVT-2024-1129", c2: "Term 1 Comprehensive PTM (Nursery to 12)", sub: "Full Academic Progress & Report Cards", c3: "PTM Session", c4: "All Students & Parents", c5: "All 48 Classrooms", c6: "Principal & HODs", c7: "29 Nov 2024 (08:30 AM)", badge: "badge-active", status: "Slots Open" },
      { c1: "EVT-2024-1130", c2: "Inter-School Robotics & AI Olympiad", sub: "STEM Innovation, Autonomous Bot Challenges", c3: "Academic Olympiad", c4: "Classes 8 to 12 Teams", c5: "Atal Tinkering Lab & Aud 2", c6: "HOD Computer Science", c7: "30 Nov 2024 (10:00 AM)", badge: "badge-active", status: "Confirmed" },
      { c1: "EVT-2024-1207", c2: "Grandparents Day Celebration", sub: "Special Musical Morning & High Tea", c3: "Cultural Function", c4: "Pre-Primary (Nursery/Prep)", c5: "Junior Amphitheater", c6: "Mrs. Shalini Verma", c7: "07 Dec 2024 (10:00 AM)", badge: "badge-active", status: "Confirmed" },
      { c1: "EVT-2024-1220", c2: "Annual Day 2024: 'Vasudhaiva Kutumbakam'", sub: "Mega Performing Arts Production & Awards", c3: "Annual Function", c4: "All School Performers", c5: "Main Air-Conditioned Auditorium", c6: "Steering Committee", c7: "20 Dec 2024 (05:00 PM)", badge: "badge-active", status: "Confirmed" }
    ]
  },

  // 8. school-settings.php
  'school-settings.php': {
    title: 'School Settings',
    desc: 'Core institutional ERP parameters, financial year rules, timezone, currency, grading systems, and SMS gateway credentials',
    kpi1: { title: "ERP Engine Version", val: "v4.2.0-PRO", trend: "Continuous LTS Release", icon: "bi-cpu-fill", color: "kpi-primary" },
    kpi2: { title: "Timezone & Locale", val: "Asia/Kolkata", trend: "Indian Standard Time (IST)", icon: "bi-globe-central-south-asia", color: "kpi-info" },
    kpi3: { title: "Active Currency", val: "₹ INR", trend: "Indian Rupee Standard", icon: "bi-currency-rupee", color: "kpi-success" },
    kpi4: { title: "Gateways Online", val: "100% Operational", trend: "SMS, WhatsApp, Email, Razorpay", icon: "bi-shield-fill-check", color: "kpi-warning" },
    filterPlaceholder: "Search config parameter, setting title, category...",
    filterOptions: ["All Configuration Domains", "Institutional Identifiers", "Academic & Grading Policies", "Financial & Fee Parameters", "Communication Gateways & API", "Security & Session Rules"],
    filterOptionName: "Setting Category",
    statusFilterOptions: ["All Status", "Active / Enforced", "System Locked", "Custom Configured", "Pending Sync"],
    headers: ["Config Key", "Parameter Title & Description", "Category", "Active System Value", "Default Value", "Modified By", "Last Updated", "Status"],
    rows: [
      { c1: "CONF-GEN-01", c2: "Official Institution Name", sub: "Primary legal school identity in all reports", c3: "Institutional Identifiers", c4: "Delhi Public Global Academy", c5: "Delhi Public Global Academy", c6: "Super Administrator", c7: "28 Oct 2024", badge: "badge-active", status: "Enforced" },
      { c1: "CONF-GEN-02", c2: "CBSE Affiliation Number", sub: "Official board affiliation reference for LOC", c3: "Institutional Identifiers", c4: "2130842 (Valid till 2029)", c5: "2130842", c6: "Super Administrator", c7: "28 Oct 2024", badge: "badge-active", status: "Locked" },
      { c1: "CONF-ACA-03", c2: "Active Academic Year", sub: "Primary active academic session for student roster", c3: "Academic Policies", c4: "2024-2025 (Active Cycle)", c5: "2024-2025", c6: "Dean Academics", c7: "01 Apr 2024", badge: "badge-active", status: "Enforced" },
      { c1: "CONF-ACA-04", c2: "Grading Scale Model", sub: "Assessment scoring standard", c3: "Academic Policies", c4: "CBSE 9-Point Grading (A1 to E)", c5: "CBSE 9-Point Scale", c6: "Dean Academics", c7: "15 May 2024", badge: "badge-active", status: "Enforced" },
      { c1: "CONF-FIN-05", c2: "Late Fee Penalty Policy", sub: "Grace period and daily charge after due date", c3: "Financial Rules", c4: "₹50 / Day after 10th of Month", c5: "₹50 / Day", c6: "Chief Accountant", c7: "10 Jul 2024", badge: "badge-active", status: "Enforced" },
      { c1: "CONF-SEC-06", c2: "Staff Session Timeout", sub: "Automatic logout threshold for inactive admin sessions", c3: "Security Rules", c4: "30 Minutes Inactivity", c5: "30 Mins", c6: "IT Systems Admin", c7: "20 Oct 2024", badge: "badge-active", status: "Enforced" },
      { c1: "CONF-COM-07", c2: "SMS & WhatsApp DLT Provider", sub: "Govt DLT approved messaging gateway for attendance & fee", c3: "Gateways & API", c4: "GupShup Enterprise DLT (Active)", c5: "GupShup Live", c6: "IT Systems Admin", c7: "25 Oct 2024", badge: "badge-active", status: "Enforced" },
      { c1: "CONF-PAY-08", c2: "Online Fee Payment Gateway", sub: "Parent portal payment processing engine", c3: "Gateways & API", c4: "Razorpay Enterprise (PG_LIVE_9481)", c5: "Razorpay Live", c6: "Chief Accountant", c7: "18 Oct 2024", badge: "badge-active", status: "Enforced" }
    ]
  },

  // 9. user-management.php
  'user-management.php': {
    title: 'User Management',
    desc: 'Institutional staff user directory, system logins, credential provisioning, 2FA status, and session tracking',
    kpi1: { title: "System Users", val: "168 Accounts", trend: "Staff & Faculty Logins", icon: "bi-people-fill", color: "kpi-primary" },
    kpi2: { title: "Super Admins", val: "4 Users", trend: "Root System Access", icon: "bi-shield-lock-fill", color: "kpi-danger" },
    kpi3: { title: "Teaching Faculty", val: "124 Users", trend: "Attendance, Marks & LMS", icon: "bi-mortarboard-fill", color: "kpi-success" },
    kpi4: { title: "2FA Enforced", val: "100% Compliant", trend: "SMS OTP & Authenticator", icon: "bi-phone-vibrate-fill", color: "kpi-info" },
    filterPlaceholder: "Search user ID, staff name, email, role...",
    filterOptions: ["All Roles", "Super Administrator", "School Principal", "Dean Academics", "Teaching Faculty", "Accountant / Cashier", "Transport Officer", "Librarian"],
    filterOptionName: "User Role",
    statusFilterOptions: ["All Status", "Active Account", "Suspended", "Password Reset Required", "Locked Out"],
    headers: ["User ID #", "Staff Full Name", "System Role", "Email Login ID", "Registered Mobile", "2FA Security", "Last Login Time", "Account Status"],
    rows: [
      { c1: "USR-001", c2: "Dr. Ananya Roy", sub: "Principal & Head of School", c3: "School Principal", c4: "principal@dpga.edu.in", c5: "+91 98110 00001", c6: "App OTP (Active)", c7: "Today (08:15 AM)", badge: "badge-active", status: "Active" },
      { c1: "USR-002", c2: "Vikram Malhotra", sub: "Director Information Tech", c3: "Super Administrator", c4: "admin@dpga.edu.in", c5: "+91 98110 00002", c6: "YubiKey & App OTP", c7: "Today (07:45 AM)", badge: "badge-active", status: "Active" },
      { c1: "USR-003", c2: "Dr. Alok Verma", sub: "HOD Physics & Science Dean", c3: "Dean Academics", c4: "alok.verma@dpga.edu.in", c5: "+91 98110 00003", c6: "SMS OTP (Active)", c7: "Today (08:30 AM)", badge: "badge-active", status: "Active" },
      { c1: "USR-004", c2: "Mrs. Radhika Iyer", sub: "HOD Commerce & Sr Faculty", c3: "Teaching Faculty", c4: "radhika.iyer@dpga.edu.in", c5: "+91 98110 00004", c6: "SMS OTP (Active)", c7: "Today (08:45 AM)", badge: "badge-active", status: "Active" },
      { c1: "USR-005", c2: "Mrs. Sunita Kaul", sub: "Senior Secondary Mathematics", c3: "Teaching Faculty", c4: "sunita.kaul@dpga.edu.in", c5: "+91 98110 00005", c6: "SMS OTP (Active)", c7: "Today (08:50 AM)", badge: "badge-active", status: "Active" },
      { c1: "USR-006", c2: "Suresh Chawla", sub: "Chief Accounts Officer", c3: "Accountant", c4: "accounts@dpga.edu.in", c5: "+91 98110 00006", c6: "App OTP (Active)", c7: "Today (08:20 AM)", badge: "badge-active", status: "Active" },
      { c1: "USR-007", c2: "Harish Chander", sub: "Fleet Operations Manager", c3: "Transport Supervisor", c4: "transport@dpga.edu.in", c5: "+91 98110 00007", c6: "SMS OTP (Active)", c7: "Today (07:15 AM)", badge: "badge-active", status: "Active" },
      { c1: "USR-008", c2: "Mrs. Meenakshi Soni", sub: "Head Librarian & Media Center", c3: "Librarian", c4: "library@dpga.edu.in", c5: "+91 98110 00008", c6: "SMS OTP (Active)", c7: "Today (08:40 AM)", badge: "badge-active", status: "Active" }
    ]
  },

  // 12. role-management.php
  'role-management.php': {
    title: 'Role Management',
    desc: 'Role definitions, security tiers, hierarchical access roles, and default permission inheritance',
    kpi1: { title: "Configured Roles", val: "12 System Roles", trend: "RBAC Security Grid", icon: "bi-shield-shaded", color: "kpi-primary" },
    kpi2: { title: "Tier 1 Root Roles", val: "2 Roles", trend: "Super Admin & Principal", icon: "bi-key-fill", color: "kpi-danger" },
    kpi3: { title: "Assigned Users", val: "168 Active Users", trend: "All Staff Profiled", icon: "bi-person-check-fill", color: "kpi-success" },
    kpi4: { title: "Inheritance Tree", val: "Hierarchical", trend: "Strict Parent-Child Tiers", icon: "bi-diagram-3", color: "kpi-info" },
    filterPlaceholder: "Search role code, title, tier...",
    filterOptions: ["All Security Tiers", "Tier 1: Root / Executive", "Tier 2: Academic Leadership", "Tier 3: Teaching Faculty", "Tier 4: Administrative & Finance", "Tier 5: Operational Support"],
    filterOptionName: "Security Tier",
    statusFilterOptions: ["All Status", "Active & Enforced", "System Reserved", "Under Audit"],
    headers: ["Role Code", "Role Title & Scope", "Security Tier", "Assigned Staff Count", "Default Landing Dashboard", "Permission Grants", "Created Date", "Status"],
    rows: [
      { c1: "ROLE-ROOT", c2: "Super Administrator", sub: "Full unrestricted system root privileges", c3: "Tier 1 (Root Access)", c4: "4 Users", c5: "dashboards/admin.php", c6: "All 28 Modules (Full Control)", c7: "01 Apr 2024", badge: "badge-active", status: "System Reserved" },
      { c1: "ROLE-PRIN", c2: "School Principal", sub: "Executive academic, HR, and institutional sanction", c3: "Tier 1 (Executive)", c4: "1 User", c5: "dashboards/principal.php", c6: "Full Read + Sanction + Audit", c7: "01 Apr 2024", badge: "badge-active", status: "System Reserved" },
      { c1: "ROLE-DEAN", c2: "Dean Academics / Vice Principal", sub: "Curriculum, timetable, examinations & PTM", c3: "Tier 2 (Academic Lead)", c4: "2 Users", c5: "dashboards/admin.php", c6: "Academics, SIS, Exams, PTM", c7: "01 Apr 2024", badge: "badge-active", status: "Active" },
      { c1: "ROLE-TCH", c2: "Teaching Faculty / Class Teacher", sub: "Attendance, marks, assignments, PTM slots", c3: "Tier 3 (Faculty)", c4: "124 Users", c5: "dashboards/teacher.php", c6: "Classroom SIS, LMS, Marks, PTM", c7: "01 Apr 2024", badge: "badge-active", status: "Active" },
      { c1: "ROLE-ACC", c2: "Chief Accountant / Cashier", sub: "Fee collection, receipts, salaries, vouchers", c3: "Tier 4 (Finance)", c4: "5 Users", c5: "dashboards/accountant.php", c6: "Fees, Finance, Payroll, Vouchers", c7: "01 Apr 2024", badge: "badge-active", status: "Active" },
      { c1: "ROLE-TRP", c2: "Transport & Fleet Manager", sub: "Bus routes, vehicle telematics, fuel, drivers", c3: "Tier 4 (Operations)", c4: "3 Users", c5: "modules/transport/routes.php", c6: "Transport & GPS Telematics Only", c7: "01 Apr 2024", badge: "badge-active", status: "Active" },
      { c1: "ROLE-LIB", c2: "Head Librarian", sub: "Accession register, book circulation, overdue fines", c3: "Tier 4 (Operations)", c4: "3 Users", c5: "modules/library/books.php", c6: "Library Management Only", c7: "01 Apr 2024", badge: "badge-active", status: "Active" },
      { c1: "ROLE-REC", c2: "Front Desk & Receptionist", sub: "Visitor passes, enquiries, postal logs, gate check", c3: "Tier 5 (Support)", c4: "4 Users", c5: "modules/front-office/visitors.php", c6: "Front Office, Visitors, Gate Pass", c7: "01 Apr 2024", badge: "badge-active", status: "Active" }
    ]
  },

  // 13. permission-management.php
  'permission-management.php': {
    title: 'Permission Management',
    desc: 'Granular Role-Based Access Control (RBAC) matrix for View, Create, Edit, Delete, and Export across all 28 modules',
    kpi1: { title: "Governed Modules", val: "28 Modules", trend: "Full RBAC Coverage", icon: "bi-grid-3x3-gap-fill", color: "kpi-primary" },
    kpi2: { title: "Granular Controls", val: "CRUD + Export", trend: "5 Operation Gates", icon: "bi-toggles", color: "kpi-success" },
    kpi3: { title: "Custom Overrides", val: "8 Special Grants", trend: "Role-Specific Permissions", icon: "bi-shield-plus", color: "kpi-warning" },
    kpi4: { title: "Security Audit", val: "Passed 100%", trend: "CBSE & ISO 27001 Standard", icon: "bi-shield-check", color: "kpi-info" },
    filterPlaceholder: "Search module, permission ID, role...",
    filterOptions: ["All Modules", "Administration & Setup", "Admissions & SIS", "Academics & Timetable", "Examinations & Marks", "Fees & Finance", "HR & Payroll", "Transport & Operations"],
    filterOptionName: "Module Scope",
    statusFilterOptions: ["All Status", "Permission Active", "Restricted", "Read-Only Grant", "Blocked"],
    headers: ["Permission ID", "Governed Module Scope", "Target Role", "View / Read", "Create / Add", "Edit / Update", "Delete / Purge", "Export CSV/PDF"],
    rows: [
      { c1: "PRM-ADM-01", c2: "Administration & Master Setup", sub: "School Profile, Branding, System Config", c3: "Super Administrator", c4: "Granted (Full)", c5: "Granted (Full)", c6: "Granted (Full)", c7: "Granted (Full)", c8: "Granted (Full)" },
      { c1: "PRM-ADM-02", c2: "Administration & Master Setup", sub: "School Profile, Branding, System Config", c3: "School Principal", c4: "Granted (Full)", c5: "Granted (Full)", c6: "Granted (Full)", c7: "Restricted (No)", c8: "Granted (Full)" },
      { c1: "PRM-ADM-03", c2: "Administration & Master Setup", sub: "School Profile, Branding, System Config", c3: "Teaching Faculty", c4: "Read Only", c5: "Blocked (No)", c6: "Blocked (No)", c7: "Blocked (No)", c8: "Blocked (No)" },
      { c1: "PRM-FEE-01", c2: "Fees Management & Invoicing", sub: "Challans, Receipts, Outstanding Ledgers", c3: "Accountant", c4: "Granted (Full)", c5: "Granted (Full)", c6: "Granted (Full)", c7: "Restricted (No)", c8: "Granted (Full)" },
      { c1: "PRM-FEE-02", c2: "Fees Management & Invoicing", sub: "Challans, Receipts, Outstanding Ledgers", c3: "Teaching Faculty", c4: "View Own Class", c5: "Blocked (No)", c6: "Blocked (No)", c7: "Blocked (No)", c8: "Blocked (No)" },
      { c1: "PRM-EXM-01", c2: "Examination & Results Processing", sub: "Report Cards, Marks Entry, Grading", c3: "Teaching Faculty", c4: "Granted (Full)", c5: "Granted (Marks)", c6: "Granted (Marks)", c7: "Blocked (No)", c8: "Granted (Class)" },
      { c1: "PRM-TRP-01", c2: "Transport & GPS Telematics", sub: "Bus Routes, Vehicle Tracking, Fuel Logs", c3: "Transport Supervisor", c4: "Granted (Full)", c5: "Granted (Full)", c6: "Granted (Full)", c7: "Blocked (No)", c8: "Granted (Full)" },
      { c1: "PRM-LIB-01", c2: "Library & Book Circulation", sub: "Accession Register, Issue/Return, Fines", c3: "Librarian", c4: "Granted (Full)", c5: "Granted (Full)", c6: "Granted (Full)", c7: "Restricted (No)", c8: "Granted (Full)" }
    ]
  },

  // 14. activity-logs.php
  'activity-logs.php': {
    title: 'Activity Logs',
    desc: 'Real-time user session auditing, authentication events, IP addresses, browser agents, and operational access logs',
    kpi1: { title: "Events Today", val: "1,842 Logged", trend: "Real-Time Telemetry", icon: "bi-activity", color: "kpi-primary" },
    kpi2: { title: "Active Sessions", val: "48 Users", trend: "Currently Authenticated", icon: "bi-person-badge", color: "kpi-success" },
    kpi3: { title: "Blocked Logins", val: "2 Attempts", trend: "Brute Force Protection", icon: "bi-shield-slash-fill", color: "kpi-danger" },
    kpi4: { title: "Average Session", val: "42 Mins", trend: "High Teacher Productivity", icon: "bi-stopwatch-fill", color: "kpi-info" },
    filterPlaceholder: "Search user, action endpoint, IP address...",
    filterOptions: ["All Event Types", "User Login / Logout", "Record Creation (POST)", "Record Modification (PUT)", "Report Export (CSV/PDF)", "Failed Authentication"],
    filterOptionName: "Event Type",
    statusFilterOptions: ["All Status", "Success (200 OK)", "Created (201)", "Unauthorized (401)", "Forbidden (403)"],
    headers: ["Log ID #", "Staff User & Role", "Action Taken / Endpoint", "Target Record", "Client IP Address", "Browser / OS", "Timestamp", "Status"],
    rows: [
      { c1: "LOG-94812", c2: "Dr. Ananya Roy", sub: "Role: Principal", c3: "Approved Sanction Order #184", c4: "Candidate: Advik Agarwal", c5: "192.168.1.10 (Admin LAN)", c6: "Chrome 128 / Windows 11", c7: "Today (08:42:15 AM)", badge: "badge-active", status: "Success" },
      { c1: "LOG-94811", c2: "Mrs. Sunita Kaul", sub: "Role: Teaching Faculty", c3: "Entered Marks: Class 10-A Maths PT-1", c4: "38 Student Records", c5: "192.168.1.45 (Staff Room)", c6: "Firefox 130 / macOS", c7: "Today (08:35:10 AM)", badge: "badge-active", status: "Success" },
      { c1: "LOG-94810", c2: "Suresh Chawla", sub: "Role: Accountant", c3: "Generated Fee Receipt #INV-ADM-0184", c4: "Amount: ₹24,500 (Razorpay)", c5: "192.168.1.20 (Accounts)", c6: "Edge 128 / Windows 11", c7: "Today (08:28:44 AM)", badge: "badge-active", status: "Success" },
      { c1: "LOG-94809", c2: "Vikram Malhotra", sub: "Role: Super Administrator", c3: "Initiated Daily MySQL Database Snapshot", c4: "db_edusys_backup.sql.gz", c5: "192.168.1.02 (IT Office)", c6: "Chrome 128 / Windows 11", c7: "Today (07:45:00 AM)", badge: "badge-active", status: "Success" },
      { c1: "LOG-94808", c2: "Harish Chander", sub: "Role: Transport Officer", c3: "Logged Fuel Refill: Bus #01 (55 Litres)", c4: "Vehicle: DL-1V-8491", c5: "192.168.1.80 (Garage)", c6: "Safari / iOS Mobile", c7: "Today (07:18:22 AM)", badge: "badge-active", status: "Success" },
      { c1: "LOG-94807", c2: "Unknown IP", sub: "Role: Anonymous Guest", c3: "Failed Password for 'admin_backup'", c4: "Invalid Credentials", c5: "203.0.113.42 (External)", c6: "Python Requests / Linux", c7: "Today (06:12:05 AM)", badge: "badge-inactive", status: "Blocked (401)" },
      { c1: "LOG-94806", c2: "Mrs. Radhika Iyer", sub: "Role: Teaching Faculty", c3: "Updated PTM Schedule Slots: Class 12-C", c4: "PTM Slot Roster", c5: "192.168.1.52 (Staff Room)", c6: "Chrome 128 / Windows 11", c7: "Yesterday (04:15:30 PM)", badge: "badge-active", status: "Success" },
      { c1: "LOG-94805", c2: "Mrs. Meenakshi Soni", sub: "Role: Librarian", c3: "Checked-in 14 Overdue Library Books", c4: "Accession #8410-8424", c5: "192.168.1.60 (Library)", c6: "Chrome 128 / Windows 11", c7: "Yesterday (03:45:12 PM)", badge: "badge-active", status: "Success" }
    ]
  },

  // 15. audit-trail.php
  'audit-trail.php': {
    title: 'Audit Trail',
    desc: 'Immutable forensic audit trail of critical operational actions: fee adjustments, grade modifications, and TC discharges',
    kpi1: { title: "Audited Actions", val: "148 Critical Events", trend: "Zero-Tampering Ledger", icon: "bi-fingerprint", color: "kpi-primary" },
    kpi2: { title: "Fee Waivers Approved", val: "12 Concessions", trend: "Principal Certified", icon: "bi-cash-coin", color: "kpi-warning" },
    kpi3: { title: "Marks Modifications", val: "4 Re-evaluations", trend: "HOD Verified Overrides", icon: "bi-pencil-fill", color: "kpi-info" },
    kpi4: { title: "Compliance Score", val: "100% Certified", trend: "Statutory CBSE Standard", icon: "bi-patch-check-fill", color: "kpi-success" },
    filterPlaceholder: "Search audit ID, officer, entity...",
    filterOptions: ["All Audit Domains", "Financial Concessions & Waivers", "Examination Marks Modification", "Student Discharges & TC Issuance", "System Security & Permission Grants"],
    filterOptionName: "Audit Domain",
    statusFilterOptions: ["All Status", "Verified & Retained", "Requires Management Counter-Sign", "Audit Flagged"],
    headers: ["Audit ID #", "Operational Domain", "Critical Action Performed", "Authorizing Officer", "Previous State / Value", "New Sanctioned State", "Audit Timestamp", "Compliance"],
    rows: [
      { c1: "AUD-2024-0148", c2: "Fee Concession", sub: "15% Sibling Discount Granted", c3: "Student: Saanvi Reddy (Cl 6)", c4: "Dr. Ananya Roy (Principal)", c5: "Gross Fee: ₹26,800 / Term", c6: "Discounted Fee: ₹22,780 / Term", c7: "28 Oct 2024 (08:45 AM)", badge: "badge-active", status: "Verified" },
      { c1: "AUD-2024-0147", c2: "Marks Re-evaluation", sub: "Class 10-A Science Periodic Test 1", c3: "Student: Vihaan Singh (Roll #03)", c4: "Dr. Alok Verma (Science Dean)", c5: "Previous Score: 18 / 25", c6: "Re-evaluated Score: 21 / 25", c7: "27 Oct 2024 (03:15 PM)", badge: "badge-active", status: "Verified" },
      { c1: "AUD-2024-0146", c2: "Transfer Certificate", sub: "Official TC Generation & Discharge", c3: "Student: Tushar Sengupta (Cl 8-B)", c4: "Dr. Ananya Roy (Principal)", c5: "Status: Enrolled Active", c6: "Status: Discharged / TC #8412", c7: "26 Oct 2024 (11:20 AM)", badge: "badge-active", status: "Verified" },
      { c1: "AUD-2024-0145", c2: "Security Role Change", sub: "Elevated User Permission Grant", c3: "User: Suresh Chawla (Accountant)", c4: "Vikram Malhotra (IT Director)", c5: "Role: Standard Cashier", c6: "Role: Chief Accounts Officer", c7: "25 Oct 2024 (02:00 PM)", badge: "badge-active", status: "Verified" },
      { c1: "AUD-2024-0144", c2: "Caution Deposit Refund", sub: "Discharged Student Caution Return", c3: "Student: Ananya Dixit (Cl 5-A)", c4: "Suresh Chawla (Accounts)", c5: "Caution Held: ₹15,000", c6: "NEFT Transferred: ₹15,000", c7: "24 Oct 2024 (10:15 AM)", badge: "badge-active", status: "Verified" },
      { c1: "AUD-2024-0143", c2: "Grade Subject Mapping", sub: "Added AI Vocational Elective", c3: "Class 10 Core Curriculum", c4: "Dean Academics", c5: "5 Subjects Mapped", c6: "6 Subjects Mapped (Added AI)", c7: "23 Oct 2024 (04:30 PM)", badge: "badge-active", status: "Verified" },
      { c1: "AUD-2024-0142", c2: "Late Fee Waiver", sub: "Medical Exemption Late Fee Waiver", c3: "Student: Kabir Mehta (Cl 3-A)", c4: "Dr. Ananya Roy (Principal)", c5: "Fine Due: ₹650", c6: "Fine Waived: ₹0 (Medical Proof)", c7: "22 Oct 2024 (01:15 PM)", badge: "badge-active", status: "Verified" },
      { c1: "AUD-2024-0141", c2: "Class Section Allocation", sub: "Section Capacity Expansion", c3: "Class 10 Section A Capacity", c4: "Dean Academics", c5: "Capacity: 35 Students", c6: "Expanded Capacity: 38 Students", c7: "21 Oct 2024 (11:00 AM)", badge: "badge-active", status: "Verified" }
    ]
  },

  // 16. backup-restore.php
  'backup-restore.php': {
    title: 'Backup & Restore UI',
    desc: 'Automated database snapshots, AWS S3 / Google Drive cloud sync, disaster recovery points, and manual restore tools',
    kpi1: { title: "Last Automated Backup", val: "Today 03:00 AM", trend: "Nightly Cron Executed", icon: "bi-cloud-check-fill", color: "kpi-success" },
    kpi2: { title: "Available Snapshots", val: "42 Archives", trend: "30-Day Rolling Retention", icon: "bi-archive-fill", color: "kpi-primary" },
    kpi3: { title: "Archive Size", val: "1.84 GB", trend: "Compressed GZIP .sql.gz", icon: "bi-hdd-fill", color: "kpi-info" },
    kpi4: { title: "Cloud Storage Sync", val: "Google Cloud", trend: "Multi-Region Offsite Backup", icon: "bi-cloud-arrow-up-fill", color: "kpi-warning" },
    filterPlaceholder: "Search snapshot ID, archive title, location...",
    filterOptions: ["All Backup Types", "Automated Daily MySQL Dumps", "Manual Pre-Update Snapshots", "Cloud Offsite Sync Archives", "Media & Document Assets Backup"],
    filterOptionName: "Backup Type",
    statusFilterOptions: ["All Status", "Verified & Healthy", "Cloud Synced", "In Progress", "Corrupted / Voided"],
    headers: ["Snapshot ID #", "Backup Archive Title", "Backup Scope", "Compression Format", "Archive File Size", "Storage Location", "Created Timestamp", "Actions"],
    rows: [
      { c1: "BKP-2024-1028", c2: "Nightly Automated System Snapshot", sub: "Complete Database Schema & 28 Modules", c3: "Full Database DUMP", c4: "GZIP Compressed (.sql.gz)", c5: "48.2 MB", c6: "Local Vault + Google Drive", c7: "28 Oct 2024 (03:00 AM)", badge: "badge-active", status: "Healthy" },
      { c1: "BKP-2024-1027", c2: "Nightly Automated System Snapshot", sub: "Complete Database Schema & 28 Modules", c3: "Full Database DUMP", c4: "GZIP Compressed (.sql.gz)", c5: "47.9 MB", c6: "Local Vault + Google Drive", c7: "27 Oct 2024 (03:00 AM)", badge: "badge-active", status: "Healthy" },
      { c1: "BKP-2024-1026", c2: "Manual Snapshot (Pre-Term 2 Update)", sub: "Before Mid-Term Marks Migration", c3: "Full Database DUMP", c4: "GZIP Compressed (.sql.gz)", c5: "47.8 MB", c6: "Local Server /backup/manual", c7: "26 Oct 2024 (04:15 PM)", badge: "badge-active", status: "Healthy" },
      { c1: "BKP-2024-1025", c2: "Nightly Automated System Snapshot", sub: "Complete Database Schema & 28 Modules", c3: "Full Database DUMP", c4: "GZIP Compressed (.sql.gz)", c5: "47.5 MB", c6: "Local Vault + Google Drive", c7: "25 Oct 2024 (03:00 AM)", badge: "badge-active", status: "Healthy" },
      { c1: "BKP-2024-1024", c2: "Nightly Automated System Snapshot", sub: "Complete Database Schema & 28 Modules", c3: "Full Database DUMP", c4: "GZIP Compressed (.sql.gz)", c5: "47.2 MB", c6: "Local Vault + Google Drive", c7: "24 Oct 2024 (03:00 AM)", badge: "badge-active", status: "Healthy" },
      { c1: "BKP-2024-1020", c2: "Weekly Cumulative Media Assets Archive", sub: "Student Photos, Documents & TCs", c3: "Uploads Directory", c4: "TAR GZIP Archive (.tar.gz)", c5: "842.0 MB", c6: "AWS S3 Coldline Storage", c7: "20 Oct 2024 (02:00 AM)", badge: "badge-active", status: "Healthy" },
      { c1: "BKP-2024-1015", c2: "Mid-Term Examinations Pre-Exam Backup", sub: "Before Exam Seating Allotment Rollout", c3: "Full Database DUMP", c4: "GZIP Compressed (.sql.gz)", c5: "46.8 MB", c6: "Local Vault + Google Drive", c7: "15 Oct 2024 (06:00 PM)", badge: "badge-active", status: "Healthy" },
      { c1: "BKP-2024-1001", c2: "Monthly Archival Baseline Snapshot", sub: "Full System Audit Baseline Archive", c3: "Full Database DUMP", c4: "GZIP Compressed (.sql.gz)", c5: "46.2 MB", c6: "Local Vault + Google Drive", c7: "01 Oct 2024 (03:00 AM)", badge: "badge-active", status: "Healthy" }
    ]
  }
};

let count = 0;
for (const [filename, d] of Object.entries(submodulesData)) {
  const filePath = path.join(ADMIN_DIR, filename);

  const content = `<?php
/**
 * EDUSYS PRO - ${d.title.toUpperCase()}
 * Dedicated operational interface & records management for ${d.title}
 */
$page_title = "${d.title}";
$page_desc = "${d.desc}";
$active_module = "administration";
$active_submodule = "${filename}";
$depth = 2;

require_once __DIR__ . '/../../includes/config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/sidebar.php';
require_once __DIR__ . '/../../includes/topbar.php';
?>

<!-- Breadcrumb Navigation -->
<div class="breadcrumb-wrapper mb-3">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb mb-0 font-size-13">
      <li class="breadcrumb-item"><a href="<?php echo base_url('dashboards/admin.php'); ?>"><i class="bi bi-house-door me-1"></i> Dashboard</a></li>
      <li class="breadcrumb-item"><a href="<?php echo base_url('modules/administration/school-profile.php'); ?>">Administration & Setup</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($page_title); ?></li>
    </ol>
  </nav>
</div>

<!-- Page Header Box -->
<div class="page-header-box mb-4">
  <div class="page-title-group">
    <h1><i class="bi bi-layers text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <a href="<?php echo base_url('modules/administration/school-profile.php'); ?>" class="btn btn-light border" title="School Institutional Dossier">
      <i class="bi bi-building me-1"></i> Profile
    </a>
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', '${filename.replace('.php', '')}_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-plus-lg me-1"></i> Add New Record
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card ${d.kpi1.color}">
      <div class="kpi-info">
        <h6>${d.kpi1.title}</h6>
        <div class="kpi-value">${d.kpi1.val}</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> ${d.kpi1.trend}</div>
      </div>
      <div class="kpi-icon"><i class="bi ${d.kpi1.icon}"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card ${d.kpi2.color}">
      <div class="kpi-info">
        <h6>${d.kpi2.title}</h6>
        <div class="kpi-value">${d.kpi2.val}</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> ${d.kpi2.trend}</div>
      </div>
      <div class="kpi-icon"><i class="bi ${d.kpi2.icon}"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card ${d.kpi3.color}">
      <div class="kpi-info">
        <h6>${d.kpi3.title}</h6>
        <div class="kpi-value">${d.kpi3.val}</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> ${d.kpi3.trend}</div>
      </div>
      <div class="kpi-icon"><i class="bi ${d.kpi3.icon}"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card ${d.kpi4.color}">
      <div class="kpi-info">
        <h6>${d.kpi4.title}</h6>
        <div class="kpi-value">${d.kpi4.val}</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> ${d.kpi4.trend}</div>
      </div>
      <div class="kpi-icon"><i class="bi ${d.kpi4.icon}"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="${d.filterPlaceholder}">
    </div>
    <select class="form-select" style="max-width: 240px;">
      ${d.filterOptions.map((opt, i) => '<option ' + (i === 0 ? 'selected' : '') + '>' + opt + '</option>').join('\n      ')}
    </select>
    <select class="form-select" style="max-width: 170px;">
      ${d.statusFilterOptions.map((opt, i) => '<option ' + (i === 0 ? 'selected' : '') + '>' + opt + '</option>').join('\n      ')}
    </select>
  </div>
  <div class="table-filter-right">
    <span class="font-size-13 text-muted">Showing <strong class="table-visible-count text-primary">${d.rows.length}</strong> verified records</span>
  </div>
</div>

<!-- Domain Data Table -->
<div class="erp-table-responsive mb-0">
  <table class="erp-table" id="mainDataTable">
    <thead>
      <tr>
        ${d.headers.map(h => '<th>' + h + '</th>').join('\n        ')}
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      ${d.rows.map(r => `
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">${r.c1}</td>
        <td>
          <div class="fw-semibold text-dark">${r.c2}</div>
          <small class="text-muted font-size-11">${r.sub || ''}</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">${r.c3}</span></td>
        <td><small class="text-dark">${r.c4}</small></td>
        <td><small class="text-muted font-mono font-size-12">${r.c5}</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">${r.c6}</span></td>
        <td><small class="text-muted">${r.c7 || ''}</small></td>
        <td><span class="badge-status ${r.badge}">${r.status || (r.c8 || 'Active')}</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, '${d.title.replace(/'/g, "\\'")}')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      `).join('')}
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
`;

  fs.writeFileSync(filePath, content, 'utf8');
  count++;
  console.log(`[GENERATED] administration/${filename} (${d.title})`);
}

console.log(`Successfully generated ${count} customized administration submodules.`);

