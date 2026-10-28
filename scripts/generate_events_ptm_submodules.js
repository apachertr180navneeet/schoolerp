/**
 * EDUSYS PRO - EVENTS & PTM MODULE SUBMODULES GENERATOR
 * Generates tailored, domain-specific UI, authentic Indian CBSE records,
 * KPIs, filters, and tables for all remaining 12 submodules in events-ptm.
 */

const fs = require('fs');
const path = require('path');

const EVENTS_DIR = path.resolve(__dirname, '../prototype/modules/events-ptm');

const submodulesData = {
  // 1. events.php
  'events.php': {
    title: 'Event Management',
    desc: 'Comprehensive master event registry, operational approvals, and venue logistical scheduling',
    kpi1: { title: "Total Events", val: "48 Events", trend: "Annual Session 2024-25", icon: "bi-calendar3-event-fill", color: "kpi-primary" },
    kpi2: { title: "Upcoming Events", val: "14 Active", trend: "Scheduled for Nov-Dec", icon: "bi-clock-history", color: "kpi-info" },
    kpi3: { title: "Total Budget", val: "₹18,50,000", trend: "₹14.20L Realized", icon: "bi-currency-rupee", color: "kpi-success" },
    kpi4: { title: "Venues Occupied", val: "82% Utilization", trend: "Auditorium & Grounds", icon: "bi-building-check", color: "kpi-warning" },
    filterPlaceholder: "Search event code, title, venue, coordinator...",
    filterOptions: ["All Event Categories", "Cultural & Arts", "Sports & Athletics", "Parent-Teacher Meetings", "Academic Olympiads", "Excursions & Field Trips"],
    filterOptionName: "Event Category",
    statusFilterOptions: ["All Status", "Confirmed", "Planning Phase", "Slots Open", "Completed", "Postponed"],
    headers: ["Event Code", "Event Title & Theme", "Category", "Target Wing", "Venue & Hall", "Budget Allocation", "Event Date", "Status"],
    rows: [
      { c1: "EVT-2024-0048", c2: "24th Annual Athletics Championship 2024", sub: "Inter-House Track & Field Events", c3: "Sports", c4: "All 4 Student Houses", c5: "Main Athletic Stadium Ground", c6: "₹3,50,000", c7: "22 Nov 2024", badge: "badge-active", status: "Confirmed" },
      { c1: "EVT-2024-0047", c2: "Children's Day Gala Carnival 2024", sub: "Magic Show, Fun Fair & Music", c3: "Cultural", c4: "Pre-Primary & Primary Wings", c5: "Central School Grounds", c6: "₹2,20,000", c7: "14 Nov 2024", badge: "badge-active", status: "Confirmed" },
      { c1: "EVT-2024-0046", c2: "Term 1 Comprehensive PTM (All Classes)", sub: "Academic Progress & Report Cards", c3: "PTM", c4: "Nursery to Class 12", c5: "All 48 Classrooms", c6: "₹45,000", c7: "29 Nov 2024", badge: "badge-active", status: "Slots Open" },
      { c1: "EVT-2024-0045", c2: "Inter-School Robotics & AI Olympiad", sub: "STEM Autonomous Bot Challenges", c3: "Academic", c4: "Senior Secondary (11-12)", c5: "Atal Tinkering Lab & Aud 2", c6: "₹1,80,000", c7: "30 Nov 2024", badge: "badge-active", status: "Confirmed" },
      { c1: "EVT-2024-0044", c2: "National Science Centre Eco-Excursion", sub: "Interactive Planetarium Workshop", c3: "Excursion", c4: "Middle Wing (Classes 6-8)", c5: "National Science Centre, Delhi", c6: "₹1,25,000", c7: "18 Nov 2024", badge: "badge-active", status: "Confirmed" },
      { c1: "EVT-2024-0043", c2: "Annual Cultural Fest & Musical Drama", sub: "'Vasudhaiva Kutumbakam' Mega Production", c3: "Cultural", c4: "Middle & Secondary Wings", c5: "Main Air-Conditioned Auditorium", c6: "₹4,80,000", c7: "20 Dec 2024", badge: "badge-pending", status: "Planning Phase" },
      { c1: "EVT-2024-0042", c2: "Class 10 & 12 Pre-Board Diagnostic PTM", sub: "CBSE LOC Performance Consultation", c3: "PTM", c4: "Board Batches", c5: "Senior Wing Rooms 201-216", c6: "₹35,000", c7: "08 Nov 2024", badge: "badge-active", status: "Slots Open" },
      { c1: "EVT-2024-0041", c2: "Grandparents Day Celebration", sub: "Special Musical Morning & High Tea", c3: "Cultural", c4: "Pre-Primary (Nursery/Prep)", c5: "Junior Amphitheater", c6: "₹85,000", c7: "07 Dec 2024", badge: "badge-active", status: "Confirmed" }
    ]
  },

  // 2. annual-functions.php
  'annual-functions.php': {
    title: 'Annual Functions',
    desc: 'Annual Day Celebrations, Foundation Day galas, Silver Jubilee pageants, and dignitary protocol management',
    kpi1: { title: "Student Performers", val: "680 Students", trend: "Dance, Choir & Theater", icon: "bi-stars", color: "kpi-primary" },
    kpi2: { title: "Auditorium Capacity", val: "1,800 Seats", trend: "100% Parent Invitations", icon: "bi-building-fill", color: "kpi-info" },
    kpi3: { title: "Chief Guest Confirmed", val: "Hon. Justice", trend: "Delhi High Court Dignitary", icon: "bi-person-badge-fill", color: "kpi-success" },
    kpi4: { title: "Stage Sequences", val: "18 Acts", trend: "3.5 Hours Program Run", icon: "bi-music-note-list", color: "kpi-warning" },
    filterPlaceholder: "Search act code, performance title, director...",
    filterOptions: ["All Performance Types", "Classical & Folk Dance", "Western & Fusion Orchestra", "Theatrical Drama", "Annual School Report & Awards", "Grand Finale"],
    filterOptionName: "Performance Segment",
    statusFilterOptions: ["All Status", "Costumes & Audio Ready", "Rehearsal in Progress", "Script Approved", "Technical Check Due"],
    headers: ["Act Code", "Performance Title & Theme", "Art Form", "Participant Batch", "Faculty Director", "Stage Run Time", "Rehearsal Status", "Status"],
    rows: [
      { c1: "ACT-2024-01", c2: "Invocation: Saraswati Vandana", sub: "Classical Bharatnatyam & Odissi Fusion", c3: "Classical Dance", c4: "Secondary Wing (24 Girls)", c5: "Guru Malini Iyer", c6: "08 Mins", c7: "Costumes Fitted", badge: "badge-active", status: "Stage Ready" },
      { c1: "ACT-2024-02", c2: "Symphony of Peace: School Orchestra", sub: "48-Piece String & Wind Ensemble", c3: "Orchestra", c4: "Classes 6 to 11 (48 Students)", c5: "Mr. Victor D'Souza", c6: "14 Mins", c7: "Full Score Rehearsed", badge: "badge-active", status: "Stage Ready" },
      { c1: "ACT-2024-03", c2: "Main Play: 'Untold Tale of Ashoka'", sub: "Epic Historical Drama with Sound & Light", c3: "Theatrical Drama", c4: "Secondary Wing (65 Cast Members)", c5: "Mr. Pradeep Joshi", c6: "35 Mins", c7: "Tech Run Scheduled", badge: "badge-pending", status: "In Rehearsal" },
      { c1: "ACT-2024-04", c2: "Global Beats: International Folk Dance", sub: "Spanish Flamenco, Irish Jig & African Rhythms", c3: "Folk Dance", c4: "Primary Wing (80 Students)", c5: "Mrs. Reena Sengupta", c6: "12 Mins", c7: "Props Delivered", badge: "badge-active", status: "Stage Ready" },
      { c1: "ACT-2024-05", c2: "Early Years Fantasy: 'Enchanted Forest'", sub: "Musical Playlet with Animal Characters", c3: "Early Childhood", c4: "Pre-Primary (120 Children)", c5: "Mrs. Shalini Verma", c6: "15 Mins", c7: "Final Dress Rehearsal", badge: "badge-active", status: "Stage Ready" },
      { c1: "ACT-2024-06", c2: "Principal's Annual Academic Report", sub: "Audio-Visual Milestone Presentation", c3: "Official Protocol", c4: "Head of School & Guests", c5: "Principal Office", c6: "18 Mins", c7: "Video Finalized", badge: "badge-active", status: "Approved" },
      { c1: "ACT-2024-07", c2: "Felicitation of CBSE Board Toppers", sub: "National Rank Holders & Scholarship Awards", c3: "Awards Ceremony", c4: "Class 10 & 12 Batch 2024", c5: "Dean Academics", c6: "25 Mins", c7: "Trophies Engraved", badge: "badge-active", status: "Ready" },
      { c1: "ACT-2024-08", c2: "Grand Finale: 'Vande Mataram 2024'", sub: "All-Cast Choir & Patriotic Pageantry", c3: "Grand Finale", c4: "All 680 Performers", c5: "All Directors Panel", c6: "10 Mins", c7: "Full Cast Staging Done", badge: "badge-active", status: "Stage Ready" }
    ]
  },

  // 3. trips.php
  'trips.php': {
    title: 'School Trips & Excursions',
    desc: 'Educational excursions, historical tours, science camps, parent consent tracking, and bus convoy safety',
    kpi1: { title: "Active Trips", val: "8 Excursions", trend: "Curriculum-Linked Tours", icon: "bi-bus-front-fill", color: "kpi-primary" },
    kpi2: { title: "Students Traveling", val: "340 Students", trend: "Safety Protocols Verified", icon: "bi-backpack-fill", color: "kpi-info" },
    kpi3: { title: "Parent Consents", val: "98.6% Signed", trend: "Digital Consent via Portal", icon: "bi-file-earmark-check-fill", color: "kpi-success" },
    kpi4: { title: "GPS Tracked Buses", val: "12 Buses", trend: "Live CCTV & Speed Governed", icon: "bi-geo-alt-fill", color: "kpi-warning" },
    filterPlaceholder: "Search trip code, destination, escort lead...",
    filterOptions: ["All Destinations", "Local Delhi-NCR Day Trips", "Outstation Heritage (Agra/Jaipur)", "Eco-Adventure Camps", "Science & Space Exploration"],
    filterOptionName: "Trip Type",
    statusFilterOptions: ["All Status", "Booked & Confirmed", "Consent Phase", "In Transit", "Trip Completed"],
    headers: ["Trip Code", "Trip Destination & Theme", "Eligible Grades", "Student Count", "Per-Student Fee", "Lead Faculty Escort", "Departure Date", "Status"],
    rows: [
      { c1: "TRP-2024-08", c2: "National Science Centre & Planetarium", sub: "Interactive Space & Robotics Exhibition", c3: "Middle (Classes 6-8)", c4: "95 Students", c5: "₹850 (All Inclusive)", c6: "Mr. Kunal Bansal (Science Lead)", c7: "18 Nov 2024", badge: "badge-active", status: "Confirmed" },
      { c1: "TRP-2024-07", c2: "Heritage Trail: Taj Mahal & Fatehpur Sikri", sub: "Mughal Architecture & History Fieldwork", c3: "Secondary (Classes 9-10)", c4: "85 Students", c5: "₹2,400 (AC Coach + Meals)", c6: "Dr. K. L. Sharma (History HOD)", c7: "06 Dec 2024", badge: "badge-active", status: "Consent Phase" },
      { c1: "TRP-2024-06", c2: "Jim Corbett Wildlife Ecology Camp", sub: "Flora, Fauna & Conservation Field Study", c3: "Senior Sec (Biology Batch)", c4: "42 Students", c5: "₹6,800 (3D / 2N Resort)", c6: "Dr. Sunita Kapoor (HOD Bio)", c7: "12 Dec 2024", badge: "badge-active", status: "Confirmed" },
      { c1: "TRP-2024-05", c2: "National Rail Museum & Heritage Steam Ride", sub: "Engineering History & Locomotive Study", c3: "Primary (Classes 3-5)", c4: "110 Students", c5: "₹650 (Coach + Snacks)", c6: "Mrs. Shalini Verma", c7: "25 Nov 2024", badge: "badge-active", status: "Confirmed" },
      { c1: "TRP-2024-04", c2: "Aravalli Biodiversity Nature Walk", sub: "Botanical Survey & Bird Watching Camp", c3: "Middle (Classes 6-7)", c4: "60 Students", c5: "₹450 (Packed Breakfast)", c6: "Mr. Deepak Rawat", c7: "20 Nov 2024", badge: "badge-active", status: "Confirmed" },
      { c1: "TRP-2024-03", c2: "NASA Kennedy Space Center Tour (Florida)", sub: "International Astronaut Training Experience", c3: "Senior Sec (Selected Batch)", c4: "18 Students", c5: "₹2,85,000 (Visa & Airfare)", c6: "Dean Academics", c7: "15 Jan 2025", badge: "badge-pending", status: "Visa Processing" },
      { c1: "TRP-2024-02", c2: "Sultanpur National Bird Sanctuary", sub: "Migratory Birds Photography Expedition", c3: "Secondary (Classes 8-10)", c4: "45 Students", c5: "₹750 (Travel + Lunch)", c6: "Mr. Pradeep Joshi", c7: "08 Dec 2024", badge: "badge-active", status: "Consent Phase" },
      { c1: "TRP-2024-01", c2: "National Crafts Museum & Pottery Workshop", sub: "Traditional Indian Artisans Masterclass", c3: "Primary (Classes 1-2)", c4: "80 Students", c5: "₹500 (Materials Inc)", c6: "Mrs. Reena Sengupta", c7: "28 Nov 2024", badge: "badge-active", status: "Confirmed" }
    ]
  },

  // 4. sports-day.php
  'sports-day.php': {
    title: 'Annual Sports Day',
    desc: 'Inter-house athletic meets, track and field championships, medal tallies, and sports ground schedules',
    kpi1: { title: "Athletes Competing", val: "520 Athletes", trend: "4 Student Houses", icon: "bi-trophy-fill", color: "kpi-success" },
    kpi2: { title: "Total Medals", val: "84 Medals", trend: "Gold, Silver, Bronze", icon: "bi-award-fill", color: "kpi-warning" },
    kpi3: { title: "House Leader", val: "Tagore House", trend: "340 Total Points (Leader)", icon: "bi-flag-fill", color: "kpi-primary" },
    kpi4: { title: "Chief Guest", val: "Olympic Boxer", trend: "Commonwealth Gold Medalist", icon: "bi-person-check-fill", color: "kpi-info" },
    filterPlaceholder: "Search event name, athlete, house, category...",
    filterOptions: ["All Athletic Disciplines", "Track Sprints (100m, 200m, 400m)", "Relay Races (4x100m)", "Field Events (Long Jump, Shot Put)", "March Past & Drill", "Fun Races (Tug of War)"],
    filterOptionName: "Sport Discipline",
    statusFilterOptions: ["All Status", "Heats Completed", "Finals Scheduled", "Medal Ceremony", "Results Declared"],
    headers: ["Event ID", "Sports Event Title", "Division / Wing", "Gold Medal Winner", "Winning House", "Timing / Record", "Schedule Slot", "Status"],
    rows: [
      { c1: "SPT-2024-101", c2: "Boys 100m Senior Sprint Final", sub: "Under-19 Championship Race", c3: "Senior Secondary", c4: "Rohan Gupta (Cl 12-A)", c5: "Ashoka House (Red)", c6: "11.24 Seconds (Record)", c7: "22 Nov (10:15 AM)", badge: "badge-active", status: "Final Scheduled" },
      { c1: "SPT-2024-102", c2: "Girls 100m Senior Sprint Final", sub: "Under-19 Championship Race", c3: "Senior Secondary", c4: "Diya Patel (Cl 12-B)", c5: "Tagore House (Blue)", c6: "12.80 Seconds", c7: "22 Nov (10:30 AM)", badge: "badge-active", status: "Final Scheduled" },
      { c1: "SPT-2024-103", c2: "Inter-House 4x100m Mixed Relay", sub: "4 Runners Per House", c3: "Secondary & Sr Sec", c4: "Tagore House Relay Team", c5: "Tagore House (Blue)", c6: "48.12 Seconds", c7: "22 Nov (11:45 AM)", badge: "badge-active", status: "Final Scheduled" },
      { c1: "SPT-2024-104", c2: "Boys Shot Put Senior Championship", sub: "5.45 kg Official Shot", c3: "Senior Secondary", c4: "Harpreet Singh (Cl 12-A)", c5: "Shivaji House (Yellow)", c6: "12.45 Meters", c7: "22 Nov (09:45 AM)", badge: "badge-active", status: "Final Scheduled" },
      { c1: "SPT-2024-105", c2: "Girls Long Jump Championship", sub: "Under-16 Category", c3: "Secondary Wing", c4: "Ananya Iyer (Cl 10-B)", c5: "Raman House (Green)", c6: "4.85 Meters", c7: "22 Nov (09:15 AM)", badge: "badge-active", status: "Final Scheduled" },
      { c1: "SPT-2024-106", c2: "Annual March Past Competition", sub: "Cadets, Bands & House Contingents", c3: "All 4 Houses", c4: "Best Contingent Trophy", c5: "Ashoka House (Red)", c6: "Judged on Synchronization", c7: "22 Nov (08:45 AM)", badge: "badge-active", status: "Opening Act" },
      { c1: "SPT-2024-107", c2: "Primary Fun Relay: Obstacle Race", sub: "Classes 3 to 5 Fun Events", c3: "Primary Wing", c4: "Kabir Mehta & Team", c5: "Shivaji House (Yellow)", c6: "Completed in 52 Secs", c7: "22 Nov (11:15 AM)", badge: "badge-active", status: "Final Scheduled" },
      { c1: "SPT-2024-108", c2: "Faculty vs Parents Tug of War", sub: "Annual Exhibition Match", c3: "Staff & Parents", c4: "Trophy of Fellowship", c5: "Parents Association", c6: "Best of 3 Pulls", c7: "22 Nov (01:15 PM)", badge: "badge-active", status: "Grand Finale" }
    ]
  },

  // 5. cultural-programs.php
  'cultural-programs.php': {
    title: 'Cultural Programs',
    desc: 'Performing arts festivals, classical music recitals, inter-school debates, Model UN, and fine arts pageants',
    kpi1: { title: "Cultural Trophies", val: "18 Won", trend: "Inter-School Circuit", icon: "bi-trophy", color: "kpi-success" },
    kpi2: { title: "Troupe Members", val: "195 Artists", trend: "Dance, Choir, Drama, Band", icon: "bi-palette-fill", color: "kpi-primary" },
    kpi3: { title: "Auditions Open", val: "12 Roles", trend: "Winter Play Casting", icon: "bi-mic-fill", color: "kpi-warning" },
    kpi4: { title: "Next Festival", val: "DPGA MUN 2024", trend: "14 Dec 2024 (300 Delegates)", icon: "bi-globe", color: "kpi-info" },
    filterPlaceholder: "Search cultural program, venue, mentor teacher...",
    filterOptions: ["All Cultural Activities", "Inter-School Debates & MUN", "Vocal & Instrumental Music", "Classical & Contemporary Dance", "Dramatics & Street Theater", "Fine Arts & Sculpture"],
    filterOptionName: "Activity Domain",
    statusFilterOptions: ["All Status", "Confirmed Date", "Casting Auditions", "Registrations Open", "Completed"],
    headers: ["Program Code", "Cultural Program Title", "Art Discipline", "Audience / Grades", "Venue", "Faculty Director", "Program Date", "Status"],
    rows: [
      { c1: "CUL-2024-01", c2: "DPGA Model United Nations (MUN 2024)", sub: "Theme: Global Climate & Economic Resilience", c3: "Model UN Debate", c4: "Secondary & Sr Sec (300 Delegates)", c5: "School Auditorium & Labs", c6: "Mrs. Meenakshi Soni", c7: "14 Dec 2024", badge: "badge-active", status: "Registrations Open" },
      { c1: "CUL-2024-02", c2: "Inter-House Classical Dance Competition", sub: "Kathak, Bharatnatyam & Kuchipudi", c3: "Classical Dance", c4: "Classes 6 to 12", c5: "Junior Amphitheater", c6: "Guru Malini Iyer", c7: "02 Dec 2024", badge: "badge-active", status: "Confirmed" },
      { c1: "CUL-2024-03", c2: "Inter-School Western Rock Band Battle", sub: "Annual Rockfest 'Rhythm 2024'", c3: "Western Music", c4: "Senior Secondary (12 Schools)", c5: "Open Air Quadrangle", c6: "Mr. Victor D'Souza", c7: "28 Dec 2024", badge: "badge-active", status: "Confirmed" },
      { c1: "CUL-2024-04", c2: "Street Play: 'Cyber Hygiene & Mental Health'", sub: "Nukkad Natak for Community Awareness", c3: "Street Theater", c4: "Class 9 & 10 Troupe", c5: "Local Community Center", c6: "Mr. Pradeep Joshi", c7: "05 Dec 2024", badge: "badge-active", status: "In Practice" },
      { c1: "CUL-2024-05", c2: "Annual Fine Arts & Sculpture Exhibition", sub: "Theme: 'Colors of India - Past & Future'", c3: "Fine Arts", c4: "Classes 1 to 12 (400 Artworks)", c5: "Central Art Gallery", c6: "Mr. A. K. Sundaram", c7: "10 Dec 2024", badge: "badge-active", status: "Confirmed" },
      { c1: "CUL-2024-06", c2: "Hindi Kavyanjali (Poetry Recitation)", sub: "Self-Composed Patriotic & Social Verses", c3: "Literary Hindi", c4: "Middle & Secondary Wings", c5: "Seminar Room 102", c6: "Dr. K. L. Sharma", c7: "26 Nov 2024", badge: "badge-active", status: "Auditions Open" },
      { c1: "CUL-2024-07", c2: "Christmas Carol Celebration & Candlelight", sub: "Traditional 80-Voice Choir Ensemble", c3: "Vocal Choir", c4: "Pre-Primary & Primary Wings", c5: "Main School Hall", c6: "Mrs. Shalini Verma", c7: "24 Dec 2024", badge: "badge-active", status: "Confirmed" },
      { c1: "CUL-2024-08", c2: "Inter-House Spell Bee & Word Power", sub: "Oxford English Master Spelling Tournament", c3: "Literary English", c4: "Primary Wing (Classes 3-5)", c5: "AV Room 2", c6: "Mrs. Reena Sengupta", c7: "03 Dec 2024", badge: "badge-active", status: "Confirmed" }
    ]
  },

  // 6. ptm-meetings.php
  'ptm-meetings.php': {
    title: 'Parent-Teacher Meetings (PTM)',
    desc: 'Formal PTM sessions calendar, parent attendance ratios, academic review agendas, and room assignments',
    kpi1: { title: "Average PTM Turnout", val: "94.2%", trend: "1,390 of 1,482 Families", icon: "bi-people-fill", color: "kpi-success" },
    kpi2: { title: "Next PTM Round", val: "29 Nov 2024", trend: "Comprehensive Term 1 PTM", icon: "bi-calendar-event-fill", color: "kpi-primary" },
    kpi3: { title: "Board Batch Coverage", val: "100%", trend: "Cl 10 & 12 Consultations", icon: "bi-patch-check-fill", color: "kpi-info" },
    kpi4: { title: "Parent Satisfaction", val: "4.8 / 5.0", trend: "Post-PTM Survey Score", icon: "bi-star-fill", color: "kpi-warning" },
    filterPlaceholder: "Search PTM session code, wing, meeting theme...",
    filterOptions: ["All PTM Sessions", "Comprehensive Term-End PTM", "Pre-Board Diagnostic Consultations", "Remedial & Subject Intervention", "Early Years Developmental Review"],
    filterOptionName: "Meeting Type",
    statusFilterOptions: ["All Status", "Slots Open for Booking", "Upcoming This Week", "Completed", "Archived"],
    headers: ["PTM Code", "PTM Meeting Session", "Applicable Wings", "Scheduled Date & Time", "Total Slots", "Booked %", "Supervising Dean", "Status"],
    rows: [
      { c1: "PTM-2024-04", c2: "Term 1 Comprehensive Academic PTM", sub: "Report Card Handover & Progress Review", c3: "All Wings (Nursery to Cl 12)", c4: "29 Nov 2024 (08:30 AM - 01:30 PM)", c5: "1,480 Slots", c6: "93.2% Booked", c7: "Dr. Ananya Roy (Principal)", badge: "badge-active", status: "Slots Open" },
      { c1: "PTM-2024-03", c2: "Class 10 & 12 Pre-Board Diagnostic PTM", sub: "CBSE LOC Performance Strategy", c3: "Senior Secondary & Secondary", c4: "08 Nov 2024 (08:30 AM - 01:30 PM)", c5: "420 Slots", c6: "98.5% Booked", c7: "Dean Academics", badge: "badge-active", status: "Upcoming" },
      { c1: "PTM-2024-02", c2: "Mid-Term Academic Remedial PTM", sub: "Specialized Student Academic Intervention", c3: "Middle Wing (Classes 6-8)", c4: "18 Oct 2024 (09:00 AM - 12:30 PM)", c5: "240 Slots", c6: "95.0% Attended", c7: "Middle Wing Head", badge: "badge-active", status: "Completed" },
      { c1: "PTM-2024-01", c2: "Early Years Foundation PTM (Nursery/Prep)", sub: "Motor Skills & Social Development", c3: "Pre-Primary Wing", c4: "28 Sep 2024 (08:30 AM - 12:00 PM)", c5: "180 Slots", c6: "96.2% Attended", c7: "Pre-Primary Coordinator", badge: "badge-active", status: "Completed" },
      { c1: "PTM-2024-05", c2: "Class 11 Stream Assessment & Career PTM", sub: "JEE/NEET/CUET Integration Guidance", c3: "Class 11 (PCM/PCB/Commerce)", c4: "13 Dec 2024 (09:00 AM - 01:00 PM)", c5: "280 Slots", c6: "58.0% Booked", c7: "Career Counseling Cell", badge: "badge-active", status: "Slots Open" },
      { c1: "PTM-2024-06", c2: "Primary School Language & Math Milestone", sub: "Foundational Literacy & Numeracy Review", c3: "Classes 1 to 5", c4: "10 Jan 2025 (08:30 AM - 01:30 PM)", c5: "480 Slots", c6: "25.0% Booked", c7: "Primary Wing Head", badge: "badge-pending", status: "Upcoming" },
      { c1: "PTM-2024-07", c2: "Pre-Board 2 Intensive Board PTM", sub: "Final Board Hall Ticket Advisory", c3: "Classes 10 & 12 Only", c4: "24 Jan 2025 (08:30 AM - 01:30 PM)", c5: "420 Slots", c6: "Awaiting Booking", c7: "Dean Academics", badge: "badge-pending", status: "Scheduled" },
      { c1: "PTM-2024-08", c2: "Annual Cumulative Result PTM 2024-25", sub: "Promotion to Next Grade & Book Lists", c3: "All Grades (Nursery to 11)", c4: "22 Mar 2025 (08:30 AM - 02:00 PM)", c5: "1,480 Slots", c6: "Awaiting Booking", c7: "Principal & Deans", badge: "badge-pending", status: "Scheduled" }
    ]
  },

  // 7. ptm-scheduling.php
  'ptm-scheduling.php': {
    title: 'PTM Scheduling',
    desc: 'Room assignments, classroom allocations, shift timings, and master teacher slot coordinators',
    kpi1: { title: "Allocated Rooms", val: "48 Classrooms", trend: "1 Room Per Section", icon: "bi-door-open-fill", color: "kpi-primary" },
    kpi2: { title: "Slot Duration", val: "10 Minutes", trend: "Includes 2m Buffer", icon: "bi-stopwatch", color: "kpi-info" },
    kpi3: { title: "Faculty on Duty", val: "124 Teachers", trend: "100% Rostered", icon: "bi-person-lines-fill", color: "kpi-success" },
    kpi4: { title: "Tea & Rest Breaks", val: "2 Interval Breaks", trend: "10:30 AM & 12:00 PM", icon: "bi-cup-hot-fill", color: "kpi-warning" },
    filterPlaceholder: "Search class, section, room #, teacher...",
    filterOptions: ["All Wings", "Pre-Primary Wing (Ground Floor)", "Primary Wing (1st Floor)", "Middle Wing (2nd Floor)", "Secondary Wing (3rd Floor)", "Senior Secondary (4th Floor)"],
    filterOptionName: "Wing Floor",
    statusFilterOptions: ["All Status", "Room Allocated", "Slots Published", "Schedule Finalized", "Pending Confirmation"],
    headers: ["Schedule ID", "Class & Section", "Assigned Room #", "Class Teacher", "Subject Teachers Present", "Shift Timings", "Slot Capacity", "Status"],
    rows: [
      { c1: "SCH-10A", c2: "Class 10 - Section A", sub: "38 Enrolled Students", c3: "Room 201 (Senior Wing)", c4: "Mrs. Sunita Kaul", c5: "Maths, Science, English, SST", c6: "08:30 AM - 01:30 PM", c7: "38 of 38 Booked", badge: "badge-active", status: "Fully Booked" },
      { c1: "SCH-10B", c2: "Class 10 - Section B", sub: "36 Enrolled Students", c3: "Room 202 (Senior Wing)", c4: "Mr. Rajiv Narang", c5: "Maths, Science, Hindi, SST", c6: "08:30 AM - 01:30 PM", c7: "35 of 36 Booked", badge: "badge-active", status: "Slots Open (1)" },
      { c1: "SCH-12S", c2: "Class 12 - Science (PCM)", sub: "32 Enrolled Students", c3: "Physics Lab 1", c4: "Dr. Alok Verma", c5: "Physics, Chem, Maths, CS", c6: "08:30 AM - 01:30 PM", c7: "32 of 32 Booked", badge: "badge-active", status: "Fully Booked" },
      { c1: "SCH-12C", c2: "Class 12 - Commerce", sub: "34 Enrolled Students", c3: "Commerce Lab 2", c4: "Mrs. Radhika Iyer", c5: "Accounts, BST, Econ, Maths", c6: "08:30 AM - 01:30 PM", c7: "31 of 34 Booked", badge: "badge-active", status: "Slots Open (3)" },
      { c1: "SCH-08A", c2: "Class 8 - Section A", sub: "35 Enrolled Students", c3: "Room 105 (Middle Wing)", c4: "Mr. Deepak Rawat", c5: "English, Science, Maths, French", c6: "08:30 AM - 01:30 PM", c7: "34 of 35 Booked", badge: "badge-active", status: "Slots Open (1)" },
      { c1: "SCH-05A", c2: "Class 5 - Section A", sub: "32 Enrolled Students", c3: "Room 12 (Primary Wing)", c4: "Mrs. Pooja Sharma", c5: "EVS, Maths, English, Hindi", c6: "08:30 AM - 01:30 PM", c7: "32 of 32 Booked", badge: "badge-active", status: "Fully Booked" },
      { c1: "SCH-01A", c2: "Class 1 - Section A", sub: "30 Enrolled Students", c3: "Room 04 (Ground Floor)", c4: "Mrs. Shalini Verma", c5: "Class Teacher & Activity", c6: "08:30 AM - 01:30 PM", c7: "30 of 30 Booked", badge: "badge-active", status: "Fully Booked" },
      { c1: "SCH-NUR", c2: "Nursery - Daisy Section", sub: "25 Enrolled Children", c3: "Kindergarten Activity Hall", c4: "Mrs. Meena Sen", c5: "Early Years Panel", c6: "08:30 AM - 12:30 PM", c7: "25 of 25 Booked", badge: "badge-active", status: "Fully Booked" }
    ]
  },

  // 8. meeting-slots.php
  'meeting-slots.php': {
    title: 'Teacher Meeting Slots',
    desc: 'Individual teacher-parent appointment slots, real-time availability calendar, and discussion agendas',
    kpi1: { title: "Total Slots Created", val: "1,480 Slots", trend: "10-Min Consultations", icon: "bi-grid-fill", color: "kpi-primary" },
    kpi2: { title: "Booked Slots", val: "1,380 Booked", trend: "93.2% Booked Capacity", icon: "bi-check2-all", color: "kpi-success" },
    kpi3: { title: "Available Slots", val: "100 Free", trend: "Walk-in Buffer Slots", icon: "bi-calendar-plus", color: "kpi-info" },
    kpi4: { title: "Completed Today", val: "248 Meetings", trend: "Logged in System", icon: "bi-clipboard-check", color: "kpi-warning" },
    filterPlaceholder: "Search slot #, student, parent, teacher...",
    filterOptions: ["All Slot Times", "Early Morning (08:30 - 10:00)", "Mid Morning (10:15 - 11:45)", "Afternoon (12:00 - 01:30)"],
    filterOptionName: "Time Window",
    statusFilterOptions: ["All Status", "Confirmed Booking", "Available / Free", "Completed", "Cancelled / No Show"],
    headers: ["Slot Token #", "Teacher & Subject", "Time Slot", "Parent Name", "Student & Roll #", "Discussion Focus", "Room #", "Status"],
    rows: [
      { c1: "SLOT-101", c2: "Mrs. Sunita Kaul (Maths)", sub: "Class 10-A Mentor", c3: "08:30 AM - 08:40 AM", c4: "Rajesh Sharma", c5: "Aarav Sharma (Roll #01)", c6: "Algebra & Pre-Board Preparation", c7: "Room 201", badge: "badge-active", status: "Confirmed" },
      { c1: "SLOT-102", c2: "Mrs. Sunita Kaul (Maths)", sub: "Class 10-A Mentor", c3: "08:42 AM - 08:52 AM", c4: "Bhavin Patel", c5: "Diya Patel (Roll #02)", c6: "Geometry Doubt Clearing Strategy", c7: "Room 201", badge: "badge-active", status: "Confirmed" },
      { c1: "SLOT-103", c2: "Dr. Alok Verma (Physics)", sub: "Class 12-Science", c3: "09:00 AM - 09:10 AM", c4: "Dr. K. S. Reddy", c5: "Saanvi Reddy (Roll #14)", c6: "CBSE Practical Assessment Logs", c7: "Physics Lab 1", badge: "badge-active", status: "Confirmed" },
      { c1: "SLOT-104", c2: "Dr. Alok Verma (Physics)", sub: "Class 12-Science", c3: "09:12 AM - 09:22 AM", c4: "Mahesh Joshi", c5: "Reyansh Joshi (Roll #08)", c6: "Electrostatics & Board Mock Exam", c7: "Physics Lab 1", badge: "badge-active", status: "Confirmed" },
      { c1: "SLOT-105", c2: "Mrs. Radhika Iyer (Accounts)", sub: "Class 12-Commerce", c3: "09:30 AM - 09:40 AM", c4: "Gopalan Nair", c5: "Prisha Nair (Roll #12)", c6: "Company Accounts & Cash Flow", c7: "Commerce Lab 2", badge: "badge-active", status: "Confirmed" },
      { c1: "SLOT-106", c2: "Mr. Rajiv Narang (Science)", sub: "Class 10-B Mentor", c3: "10:15 AM - 10:25 AM", c4: "Available for Walk-in", c5: "— Unassigned —", c6: "Buffer Slot for Emergency Query", c7: "Room 202", badge: "badge-pending", status: "Available" },
      { c1: "SLOT-107", c2: "Mr. Deepak Rawat (French)", sub: "Middle Wing", c3: "11:00 AM - 11:10 AM", c4: "Sunil Deshmukh", c5: "Arya Deshmukh (Roll #05)", c6: "Grammar & Speaking Fluency", c7: "Room 105", badge: "badge-active", status: "Confirmed" },
      { c1: "SLOT-108", c2: "Mrs. Shalini Verma (Primary)", sub: "Class 1-A Mentor", c3: "11:30 AM - 11:40 AM", c4: "Rakesh Mehta", c5: "Kabir Mehta (Roll #18)", c6: "Reading Speed & Cursive Writing", c7: "Room 04", badge: "badge-active", status: "Confirmed" }
    ]
  },

  // 9. parent-booking.php
  'parent-booking.php': {
    title: 'Parent Booking Portal',
    desc: 'Self-service parent PTM reservation engine, instant time slot lock, and calendar sync',
    kpi1: { title: "Active Bookings", val: "1,380 Confirmed", trend: "Parent Portal Reservations", icon: "bi-calendar-check-fill", color: "kpi-primary" },
    kpi2: { title: "SMS Confirmation", val: "100% Dispatched", trend: "Slot Details Sent to Mobile", icon: "bi-chat-dots-fill", color: "kpi-success" },
    kpi3: { title: "Rescheduled Slots", val: "24 Changes", trend: "Self-Managed via App", icon: "bi-arrow-left-right", color: "kpi-info" },
    kpi4: { title: "Special Focus Notes", val: "842 Submitted", trend: "Pre-Shared with Faculty", icon: "bi-pencil-square", color: "kpi-warning" },
    filterPlaceholder: "Search booking reference #, parent, student...",
    filterOptions: ["All Grades", "Pre-Primary (Nursery/Prep)", "Primary Wing (Class 1-5)", "Middle Wing (Class 6-8)", "Secondary (Class 9-10)", "Senior Secondary (Class 11-12)"],
    filterOptionName: "Student Wing",
    statusFilterOptions: ["All Status", "Confirmed", "Rescheduled", "Attended", "No Show"],
    headers: ["Booking Ref #", "Student Full Name", "Class & Section", "Parent / Guardian", "Teacher Appointed", "Slot Time", "Discussion Notes", "Status"],
    rows: [
      { c1: "BKG-2024-8491", c2: "Aarav Sharma", sub: "Roll #01", c3: "Class 10 - Section A", c4: "Rajesh Sharma (+91 98112 34567)", c5: "Mrs. Sunita Kaul (Class Teacher)", c6: "29 Nov (08:30 AM)", c7: "Maths pre-board doubt resolution", badge: "badge-active", status: "Confirmed" },
      { c1: "BKG-2024-8492", c2: "Diya Patel", sub: "Roll #02", c3: "Class 10 - Section A", c4: "Bhavin Patel (+91 98223 45678)", c5: "Mrs. Sunita Kaul (Class Teacher)", c6: "29 Nov (08:42 AM)", c7: "Time management during science exam", badge: "badge-active", status: "Confirmed" },
      { c1: "BKG-2024-8493", c2: "Vihaan Singh", sub: "Roll #03", c3: "Class 10 - Section B", c4: "Manpreet Singh (+91 98334 56789)", c5: "Mr. Rajiv Narang (Class Teacher)", c6: "29 Nov (09:00 AM)", c7: "Hindi language handwriting guidance", badge: "badge-active", status: "Confirmed" },
      { c1: "BKG-2024-8494", c2: "Ananya Iyer", sub: "Roll #04", c3: "Class 10 - Section B", c4: "R. Venkatesh Iyer (+91 98445 67890)", c5: "Mr. Rajiv Narang (Class Teacher)", c6: "29 Nov (09:15 AM)", c7: "CBSE board registration spelling check", badge: "badge-active", status: "Confirmed" },
      { c1: "BKG-2024-8495", c2: "Rohan Gupta", sub: "Roll #05", c3: "Class 12 - Science (PCM)", c4: "Sanjay Gupta (+91 98556 78901)", c5: "Dr. Alok Verma (Physics HOD)", c6: "29 Nov (09:30 AM)", c7: "JEE Main vs Board balance advisory", badge: "badge-active", status: "Confirmed" },
      { c1: "BKG-2024-8496", c2: "Ishaan Verma", sub: "Roll #06", c3: "Class 12 - Science (PCB)", c4: "Dr. Alok Verma (+91 98667 89012)", c5: "Dr. Sunita Kapoor (Biology HOD)", c6: "29 Nov (09:45 AM)", c7: "NEET preparation test scores", badge: "badge-active", status: "Confirmed" },
      { c1: "BKG-2024-8497", c2: "Prisha Nair", sub: "Roll #07", c3: "Class 11 - Commerce", c4: "Gopalan Nair (+91 98445 77889)", c5: "Mrs. Radhika Iyer (Accounts HOD)", c6: "29 Nov (10:15 AM)", c7: "Applied maths syllabus completion", badge: "badge-active", status: "Confirmed" },
      { c1: "BKG-2024-8498", c2: "Kabir Mehta", sub: "Roll #08", c3: "Class 3 - Section A", c4: "Rakesh Mehta (+91 98667 99001)", c5: "Mrs. Pooja Sharma (Class Teacher)", c6: "29 Nov (10:30 AM)", c7: "Involvement in co-curricular clubs", badge: "badge-active", status: "Confirmed" }
    ]
  },

  // 10. meeting-feedback.php
  'meeting-feedback.php': {
    title: 'Meeting Feedback',
    desc: 'Post-PTM parental satisfaction ratings, teacher resolution notes, and remedial action trackers',
    kpi1: { title: "Feedback Received", val: "1,290 Forms", trend: "93.5% Response Rate", icon: "bi-chat-left-quote-fill", color: "kpi-primary" },
    kpi2: { title: "Approval Rating", val: "96.8%", trend: "Satisfied / Very Satisfied", icon: "bi-emoji-smile-fill", color: "kpi-success" },
    kpi3: { title: "Action Items Logged", val: "142 Actions", trend: "Remedial Coaching Due", icon: "bi-list-check", color: "kpi-info" },
    kpi4: { title: "Follow-up Resolved", val: "128 Closed", trend: "Within 7 Working Days", icon: "bi-check2-circle", color: "kpi-warning" },
    filterPlaceholder: "Search feedback ID, student, parent, rating...",
    filterOptions: ["All Ratings", "5 Stars (Exceptional)", "4 Stars (Very Good)", "3 Stars (Satisfactory)", "2 Stars (Needs Follow-up)"],
    filterOptionName: "Parent Rating",
    statusFilterOptions: ["All Status", "Resolved & Closed", "Remedial Assigned", "Action in Progress", "Pending Teacher Response"],
    headers: ["Feedback #", "Student Full Name", "Class & Section", "Parent Reviewer", "Rating", "Key Discussion Summary", "Remedial Action Agreed", "Status"],
    rows: [
      { c1: "FDB-2024-1290", c2: "Aarav Sharma", sub: "Roll #01", c3: "Class 10 - Section A", c4: "Rajesh Sharma", c5: "★★★★★ (5/5)", c6: "Appreciated dedicated doubt clearing sessions", c7: "Extra practice worksheets assigned for Trigo", badge: "badge-active", status: "Resolved" },
      { c1: "FDB-2024-1289", c2: "Diya Patel", sub: "Roll #02", c3: "Class 10 - Section A", c4: "Bhavin Patel", c5: "★★★★★ (5/5)", c6: "Excellent feedback on presentation skills", c7: "Continue weekly mock timed tests", badge: "badge-active", status: "Resolved" },
      { c1: "FDB-2024-1288", c2: "Vihaan Singh", sub: "Roll #03", c3: "Class 10 - Section B", c4: "Manpreet Singh", c5: "★★★★☆ (4/5)", c6: "Requested extra guidance in Hindi grammar", c7: "Enrolled in Saturday Remedial Clinic", badge: "badge-active", status: "Remedial Assigned" },
      { c1: "FDB-2024-1287", c2: "Ananya Iyer", sub: "Roll #04", c3: "Class 10 - Section B", c4: "R. Venkatesh Iyer", c5: "★★★★★ (5/5)", c6: "Happy with teacher accessibility & feedback", c7: "Encouraged for Science Exhibition leadership", badge: "badge-active", status: "Resolved" },
      { c1: "FDB-2024-1286", c2: "Rohan Gupta", sub: "Roll #05", c3: "Class 12 - Science (PCM)", c4: "Sanjay Gupta", c5: "★★★★☆ (4/5)", c6: "Requested guidance on balancing JEE test dates", c7: "Counselor scheduled individual roadmap session", badge: "badge-active", status: "Action in Progress" },
      { c1: "FDB-2024-1285", c2: "Ishaan Verma", sub: "Roll #06", c3: "Class 12 - Science (PCB)", c4: "Dr. Alok Verma", c5: "★★★★★ (5/5)", c6: "Very satisfied with Biology lab practical hours", c7: "Maintain high consistency in Chemistry", badge: "badge-active", status: "Resolved" },
      { c1: "FDB-2024-1284", c2: "Prisha Nair", sub: "Roll #07", c3: "Class 11 - Commerce", c4: "Gopalan Nair", c5: "★★★★★ (5/5)", c6: "Commended HOD Commerce on real-world examples", c7: "Nominated for Inter-School Business Conclave", badge: "badge-active", status: "Resolved" },
      { c1: "FDB-2024-1283", c2: "Kabir Mehta", sub: "Roll #08", c3: "Class 3 - Section A", c4: "Rakesh Mehta", c5: "★★★★★ (5/5)", c6: "Child is confident and loves library period", c7: "Encourage bilingual reading habits at home", badge: "badge-active", status: "Resolved" }
    ]
  },

  // 11. event-registrations.php
  'event-registrations.php': {
    title: 'Event Registrations',
    desc: 'Attendee entry pass ticketing, digital QR validation, badge printing, and refreshment token tracking',
    kpi1: { title: "Registrations Issued", val: "1,840 Passes", trend: "Students, Parents & Alumni", icon: "bi-ticket-perforated-fill", color: "kpi-primary" },
    kpi2: { title: "QR Codes Verified", val: "1,780 Validated", trend: "Automated Gate Scanners", icon: "bi-qr-code", color: "kpi-success" },
    kpi3: { title: "Auditorium Seats", val: "1,450 Reserved", trend: "Numbered Seating Passes", icon: "bi-film", color: "kpi-info" },
    kpi4: { title: "Refreshment Tokens", val: "1,840 Issued", trend: "High Tea & Snack Counters", icon: "bi-cup-straw", color: "kpi-warning" },
    filterPlaceholder: "Search pass #, attendee name, event name...",
    filterOptions: ["All Events", "Annual Sports Day 2024", "Children's Day Gala Carnival", "Term 1 Comprehensive PTM", "Robotics & AI Olympiad", "Model United Nations (MUN)"],
    filterOptionName: "Event Registration",
    statusFilterOptions: ["All Status", "Pass Dispatched (Active)", "Admitted at Gate", "Checked-in", "Voided / Cancelled"],
    headers: ["Pass ID #", "Attendee Full Name", "Attendee Role", "Registered Event", "Gate & Seat #", "Issue Date", "QR Entry Status", "Status"],
    rows: [
      { c1: "PASS-2024-1840", c2: "Rajesh Sharma", sub: "Father of Aarav (Cl 10-A)", c3: "Parent Attendee", c4: "Annual Sports Day 2024", c5: "Gate 2 &bull; Stand B-14", c6: "28 Oct 2024", badge: "badge-active", status: "Pass Issued" },
      { c1: "PASS-2024-1839", c2: "Bhavin Patel", sub: "Father of Diya (Cl 10-A)", c3: "Parent Attendee", c4: "Annual Sports Day 2024", c5: "Gate 2 &bull; Stand B-15", c6: "28 Oct 2024", badge: "badge-active", status: "Pass Issued" },
      { c1: "PASS-2024-1838", c2: "Aarav Sharma", sub: "Roll #01", c3: "Student Participant", c4: "Annual Sports Day 2024", c5: "Gate 1 &bull; Athlete Bay", c6: "27 Oct 2024", badge: "badge-active", status: "Checked-in" },
      { c1: "PASS-2024-1837", c2: "Dr. K. S. Reddy", sub: "Parent of Saanvi (Cl 6)", c3: "Parent Attendee", c4: "Children's Day Carnival", c5: "Gate 3 &bull; Family Lawn", c6: "27 Oct 2024", badge: "badge-active", status: "Pass Issued" },
      { c1: "PASS-2024-1836", c2: "Prisha Nair", sub: "Roll #12", c3: "Student Delegate", c4: "Model United Nations (MUN)", c5: "Auditorium &bull; Seat F-08", c6: "26 Oct 2024", badge: "badge-active", status: "Pass Issued" },
      { c1: "PASS-2024-1835", c2: "Rohan Gupta", sub: "Roll #05", c3: "Student Captain", c4: "Robotics & AI Olympiad", c5: "Lab Arena &bull; Bay 04", c6: "25 Oct 2024", badge: "badge-active", status: "Pass Issued" },
      { c1: "PASS-2024-1834", c2: "Dr. Alok Verma", sub: "Parent of Ishaan (Cl 12)", c3: "Guest of Honor", c4: "Annual Sports Day 2024", c5: "VIP Pavilion &bull; Row A", c6: "24 Oct 2024", badge: "badge-active", status: "Pass Issued" },
      { c1: "PASS-2024-1833", c2: "Kabir Mehta", sub: "Roll #18", c3: "Student Attendee", c4: "Children's Day Carnival", c5: "Gate 3 &bull; Junior Area", c6: "24 Oct 2024", badge: "badge-active", status: "Pass Issued" }
    ]
  },

  // 12. event-reports.php
  'event-reports.php': {
    title: 'Event MIS Reports',
    desc: 'Audited post-event summaries, budget reconciliation sheets, participation analytics, and board filings',
    kpi1: { title: "Generated Audits", val: "16 Reports", trend: "Compliant with School Board", icon: "bi-file-earmark-bar-graph-fill", color: "kpi-primary" },
    kpi2: { title: "Budget Reconciled", val: "₹14,20,000", trend: "₹4.30L Under Allocation", icon: "bi-cash-coin", color: "kpi-success" },
    kpi3: { title: "Turnout Ratio", val: "94.8%", trend: "1,740 of 1,840 Registered", icon: "bi-graph-up-arrow", color: "kpi-info" },
    kpi4: { title: "Media Archives", val: "1,200 Photos", trend: "Cloud Gallery Synced", icon: "bi-camera-fill", color: "kpi-warning" },
    filterPlaceholder: "Search report code, title, event domain...",
    filterOptions: ["All Event Domains", "Annual Flagship Celebrations", "PTM Attendance & Resolution Audits", "Athletic Competitions & Medals", "Excursion Safety & Expenditure"],
    filterOptionName: "Report Domain",
    statusFilterOptions: ["All Status", "Audited & Certified", "Finance Reconciled", "Under Final Review", "Draft"],
    headers: ["Report Code", "Report Title & Subject", "Event Domain", "Target Scope", "Compiled By", "Audited Budget (₹)", "Generated Date", "Status"],
    rows: [
      { c1: "REP-EVT-016", c2: "Term 1 PTM Attendance & Feedback Audit", sub: "94.2% Turnout across 48 Sections", c3: "Parent-Teacher Meetings", c4: "All 1,482 Families", c5: "Dean Academics", c6: "₹45,000 (Operational)", c7: "Today (09:00 AM)", badge: "badge-active", status: "Certified" },
      { c1: "REP-EVT-015", c2: "24th Annual Sports Day Financial Audit", sub: "Track & Field Equipment, Medals & Refreshments", c3: "Sports & Athletics", c4: "Main Athletic Meet", c5: "Chief Accountant", c6: "₹3,42,800", c7: "28 Oct 2024", badge: "badge-active", status: "Reconciled" },
      { c1: "REP-EVT-014", c2: "National Science Centre Excursion Safety Report", sub: "Bus GPS Telematics & Student Manifest", c3: "School Excursions", c4: "Middle Wing (95 Students)", c5: "Transport Supervisor", c6: "₹80,750", c7: "27 Oct 2024", badge: "badge-active", status: "Certified" },
      { c1: "REP-EVT-013", c2: "Children's Day Carnival Budget Summary", sub: "Vendor Stall Rentals, Artist Fees & Sound", c3: "Cultural Celebrations", c4: "Junior School Event", c5: "Cultural Committee", c6: "₹2,18,500", c7: "26 Oct 2024", badge: "badge-active", status: "Certified" },
      { c1: "REP-EVT-012", c2: "Inter-House Debate & Cultural Trophy Tally", sub: "House Points Ledger for Best House Trophy", c3: "Co-Curricular Points", c4: "All 4 Student Houses", c5: "Senior Activity Mentor", c6: "₹25,000", c7: "25 Oct 2024", badge: "badge-active", status: "Certified" },
      { c1: "REP-EVT-011", c2: "Annual Day 2024 Stage & Audio Vendor Audit", sub: "Auditorium LED Wall, Moving Lights & Costumes", c3: "Annual Celebrations", c4: "Main School Gala", c5: "Estate Manager", c6: "₹4,75,000", c7: "24 Oct 2024", badge: "badge-active", status: "Reconciled" },
      { c1: "REP-EVT-010", c2: "Model United Nations (MUN) Sponsorship Statement", sub: "Delegate Registration Fees & Delegate Kits", c3: "Student Conference", c4: "300 External Delegates", c5: "Teacher Advisor MUN", c6: "₹3,60,000", c7: "23 Oct 2024", badge: "badge-active", status: "Certified" },
      { c1: "REP-EVT-009", c2: "Diwali Charity Drive & Donation Report", sub: "Stationery & Blanket Kits for Underprivileged", c3: "Community Outreach", c4: "Social Service Club", c5: "Counseling Dept", c6: "₹1,12,000", c7: "22 Oct 2024", badge: "badge-active", status: "Certified" }
    ]
  }
};

let count = 0;
for (const [filename, d] of Object.entries(submodulesData)) {
  const filePath = path.join(EVENTS_DIR, filename);

  const content = `<?php
/**
 * EDUSYS PRO - ${d.title.toUpperCase()}
 * Dedicated operational interface & records management for ${d.title}
 */
$page_title = "${d.title}";
$page_desc = "${d.desc}";
$active_module = "events-ptm";
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
      <li class="breadcrumb-item"><a href="<?php echo base_url('modules/events-ptm/calendar.php'); ?>">Events & PTM</a></li>
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
    <a href="<?php echo base_url('modules/events-ptm/calendar.php'); ?>" class="btn btn-light border" title="Interactive Master Calendar">
      <i class="bi bi-calendar3 me-1"></i> Calendar
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
    <select class="form-select" style="max-width: 220px;">
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
        <td><span class="badge-status ${r.badge}">${r.status}</span></td>
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
  console.log(`[GENERATED] events-ptm/${filename} (${d.title})`);
}

console.log(`Successfully generated ${count} customized events-ptm submodules.`);

