/**
 * EDUSYS PRO - SPECIALIZED ADMISSION MANAGEMENT SUBMODULES GENERATOR
 * Generates tailored, domain-specific UI, authentic Indian CBSE records,
 * KPIs, filters, and tables for all 17 submodules in the admissions module.
 */

const fs = require('fs');
const path = require('path');

const ADMISSIONS_DIR = path.resolve(__dirname, '../prototype/modules/admissions');

const submodulesData = {
  // 1. enquiries.php
  'enquiries.php': {
    title: 'Admission Enquiries',
    icon: 'bi-telephone-inbound-fill',
    actionBtnText: 'Record New Enquiry',
    actionBtnIcon: 'bi-plus-lg',
    desc: 'Prospective student enquiry registry, lead scoring, and counselor allocation desk',
    kpi1: { title: "Total Enquiries", val: "1,248 Leads", trend: "+24% YoY Growth", icon: "bi-telephone-inbound-fill", color: "kpi-primary" },
    kpi2: { title: "Hot / Warm Leads", val: "482 Active", trend: "High Conversion Intent", icon: "bi-fire", color: "kpi-warning" },
    kpi3: { title: "Today's Follow-ups", val: "42 Scheduled", trend: "Assigned to Counselors", icon: "bi-calendar-check-fill", color: "kpi-info" },
    kpi4: { title: "Enquiry-to-Form Yield", val: "67.4%", trend: "Above City Benchmark", icon: "bi-graph-up-arrow", color: "kpi-success" },
    filterPlaceholder: "Search student name, enquiry #, parent, mobile...",
    filterOptions: ["All Lead Temperatures", "Hot Lead (Immediate Action)", "Warm Lead (Exploring Options)", "Cold Lead (Future Session)", "Converted to Application"],
    filterOptionName: "Lead Temperature",
    statusFilterOptions: ["All Status", "Active Follow-up", "Form Purchased", "Visit Scheduled", "Cold / Closed"],
    headers: ["Enquiry #", "Prospective Student", "Applied Grade", "Parent Name", "Contact Mobile", "Assigned Counselor", "Next Follow-up", "Temperature"],
    rows: [
      { c1: "ENQ-2025-1048", c2: "Aarav Singhania", sub: "Class 1 - Nursery", c3: "Pre-Primary Wing", c4: "Vikram Singhania", c5: "+91 98111 22334", c6: "Mrs. Shalini Verma", c7: "29 Oct 2024", badge: "badge-active", status: "Hot Lead" },
      { c1: "ENQ-2025-1047", c2: "Meera Krishnan", sub: "Class 6 - Middle", c3: "Middle Wing", c4: "Dr. R. Krishnan", c5: "+91 98222 33445", c6: "Mr. Deepak Rawat", c7: "30 Oct 2024", badge: "badge-active", status: "Warm Lead" },
      { c1: "ENQ-2025-1046", c2: "Devansh Bhardwaj", sub: "Class 11 - Science (PCM)", c3: "Senior Secondary", c4: "Alok Bhardwaj", c5: "+91 98333 44556", c6: "Dr. Sunita Kapoor", c7: "29 Oct 2024", badge: "badge-active", status: "Hot Lead" },
      { c1: "ENQ-2025-1045", c2: "Ananya Deshpande", sub: "Class 9 - Secondary", c3: "Secondary Wing", c4: "Sameer Deshpande", c5: "+91 98444 55667", c6: "Mrs. Shalini Verma", c7: "31 Oct 2024", badge: "badge-pending", status: "Warm Lead" },
      { c1: "ENQ-2025-1044", c2: "Tanvi Choudhary", sub: "Class 11 - Commerce", c3: "Senior Secondary", c4: "Raman Choudhary", c5: "+91 98555 66778", c6: "Mr. Deepak Rawat", c7: "01 Nov 2024", badge: "badge-active", status: "Converted" },
      { c1: "ENQ-2025-1043", c2: "Ishaan Mukherjee", sub: "Class 4 - Primary", c3: "Primary Wing", c4: "Subhash Mukherjee", c5: "+91 98666 77889", c6: "Mrs. Shalini Verma", c7: "28 Oct 2024", badge: "badge-pending", status: "Cold Lead" },
      { c1: "ENQ-2025-1042", c2: "Riyaan Kapoor", sub: "Class 1 - Prep", c3: "Pre-Primary Wing", c4: "Kunal Kapoor", c5: "+91 98777 88990", c6: "Dr. Sunita Kapoor", c7: "30 Oct 2024", badge: "badge-active", status: "Hot Lead" },
      { c1: "ENQ-2025-1041", c2: "Navya Pillai", sub: "Class 11 - Humanities", c3: "Senior Secondary", c4: "Suresh Pillai", c5: "+91 98888 99001", c6: "Mr. Deepak Rawat", c7: "02 Nov 2024", badge: "badge-active", status: "Warm Lead" }
    ]
  },

  // 2. follow-ups.php
  'follow-ups.php': {
    title: 'Enquiry Follow-ups',
    icon: 'bi-headset',
    actionBtnText: 'Schedule Follow-up',
    actionBtnIcon: 'bi-calendar-plus',
    desc: 'Telephonic, WhatsApp, and in-person counselor interaction tracking and dispositions',
    kpi1: { title: "Calls Scheduled", val: "64 Pending", trend: "Today's Worklist", icon: "bi-telephone-outbound-fill", color: "kpi-primary" },
    kpi2: { title: "Calls Logged Today", val: "38 Completed", trend: "Avg Duration 5m 40s", icon: "bi-headset", color: "kpi-info" },
    kpi3: { title: "Visits Scheduled", val: "18 Families", trend: "Campus Tour Confirmed", icon: "bi-geo-alt-fill", color: "kpi-success" },
    kpi4: { title: "Overdue Callbacks", val: "6 Overdue", trend: "Requires Escalation", icon: "bi-exclamation-triangle-fill", color: "kpi-warning" },
    filterPlaceholder: "Search counselor, student, follow-up notes...",
    filterOptions: ["All Communication Channels", "Telephonic Call", "WhatsApp Broadcast", "In-Person Consultation", "Email Newsletter"],
    filterOptionName: "Channel",
    statusFilterOptions: ["All Dispositions", "Interested & Form Sent", "Callback Requested", "Campus Visit Booked", "Fee Structure Shared", "Not Interested"],
    headers: ["Follow-up ID", "Prospective Student", "Applied Grade", "Assigned Counselor", "Channel", "Counselor Remarks", "Callback Date", "Disposition"],
    rows: [
      { c1: "FOL-2025-0412", c2: "Aarav Singhania", sub: "Pre-Primary Wing", c3: "Class 1 - Nursery", c4: "Mrs. Shalini Verma", c5: "Phone Call (10 mins)", c6: "Parent very eager for Nursery; invited for campus visit tomorrow 11 AM", c7: "29 Oct 2024", badge: "badge-active", status: "Visit Booked" },
      { c1: "FOL-2025-0411", c2: "Meera Krishnan", sub: "Middle Wing", c3: "Class 6 - Middle", c4: "Mr. Deepak Rawat", c5: "WhatsApp Chat", c6: "Shared fee structure and ICSE to CBSE transition guide; positive feedback", c7: "30 Oct 2024", badge: "badge-active", status: "Form Sent" },
      { c1: "FOL-2025-0410", c2: "Devansh Bhardwaj", sub: "Senior Secondary", c3: "Class 11 - Science (PCM)", c4: "Dr. Sunita Kapoor", c5: "In-Person Session", c6: "Father discussed IIT-JEE coaching tie-up and integrated lab facilities", c7: "29 Oct 2024", badge: "badge-active", status: "Enrolled" },
      { c1: "FOL-2025-0409", c2: "Ananya Deshpande", sub: "Secondary Wing", c3: "Class 9 - Secondary", c4: "Mrs. Shalini Verma", c5: "Phone Call (6 mins)", c6: "Parent requested callback after 5 PM due to office meetings", c7: "31 Oct 2024", badge: "badge-pending", status: "Callback Req" },
      { c1: "FOL-2025-0408", c2: "Tanvi Choudhary", sub: "Senior Secondary", c3: "Class 11 - Commerce", c4: "Mr. Deepak Rawat", c5: "Phone Call (8 mins)", c6: "Application purchased online #ONL-2025-0681; entrance test scheduled", c7: "Completed", badge: "badge-active", status: "Converted" },
      { c1: "FOL-2025-0407", c2: "Ishaan Mukherjee", sub: "Primary Wing", c3: "Class 4 - Primary", c4: "Mrs. Shalini Verma", c5: "WhatsApp Broadcast", c6: "Sent digital prospectus; parent opened message; follow up on Saturday", c7: "02 Nov 2024", badge: "badge-pending", status: "Awaiting Reply" },
      { c1: "FOL-2025-0406", c2: "Riyaan Kapoor", sub: "Pre-Primary Wing", c3: "Class 1 - Prep", c4: "Dr. Sunita Kapoor", c5: "Phone Call (12 mins)", c6: "Discussed transport bus route for Dwarka Sector 12; confirmed feasible", c7: "30 Oct 2024", badge: "badge-active", status: "Visit Booked" },
      { c1: "FOL-2025-0405", c2: "Navya Pillai", sub: "Senior Secondary", c3: "Class 11 - Humanities", c4: "Mr. Deepak Rawat", c5: "In-Person Session", c6: "Student interested in Psychology and Fine Arts; syllabus explained", c7: "02 Nov 2024", badge: "badge-active", status: "Hot Lead" }
    ]
  },

  // 3. lead-sources.php
  'lead-sources.php': {
    title: 'Lead Sources',
    icon: 'bi-diagram-3-fill',
    actionBtnText: 'Add Lead Channel',
    actionBtnIcon: 'bi-plus-lg',
    desc: 'Multi-channel acquisition attribution: Website, Social Ads, Parent Referrals, Education Fairs, and Print Banners',
    kpi1: { title: "Top Source", val: "Google Search (42%)", trend: "8.4% Conversion Rate", icon: "bi-google", color: "kpi-primary" },
    kpi2: { title: "Parent Referrals", val: "284 Leads (23%)", trend: "Highest 78% Enroll Yield", icon: "bi-people-fill", color: "kpi-success" },
    kpi3: { title: "Active Campaigns", val: "8 Live Channels", trend: "Autumn Intake 2025-26", icon: "bi-megaphone-fill", color: "kpi-info" },
    kpi4: { title: "Cost Per Lead", val: "₹420 Avg", trend: "-18% Lower YoY", icon: "bi-currency-rupee", color: "kpi-warning" },
    filterPlaceholder: "Search channel name, campaign ID, manager...",
    filterOptions: ["All Source Types", "Digital Search & PPC", "Parent & Alumni Referrals", "Social Media (Instagram/FB)", "Education Expos & Walk-ins", "Outdoor Hoardings"],
    filterOptionName: "Source Category",
    statusFilterOptions: ["All Status", "Active Campaign", "Paused", "Seasonal", "Completed"],
    headers: ["Channel Code", "Acquisition Channel", "Category", "Total Leads", "Applications", "Admissions Done", "Cost / Lead", "Performance"],
    rows: [
      { c1: "SRC-GOOGLE", c2: "Google Organic & Ads (SEO/SEM)", sub: "Campaign: CBSE South Delhi", c3: "Digital Search", c4: "524 Leads", c5: "210 Forms", c6: "84 Enrolled", c7: "₹380", badge: "badge-active", status: "High Yield" },
      { c1: "SRC-REFERRAL", c2: "Parent & Staff Word-of-Mouth", sub: "Sibling & Friend Circle", c3: "Referral Network", c4: "284 Leads", c5: "196 Forms", c6: "142 Enrolled", c7: "₹0 (Organic)", badge: "badge-active", status: "Top ROI (78%)" },
      { c1: "SRC-INSTA", c2: "Instagram & Facebook Meta Ads", sub: "Video Tour of Campus", c3: "Social Media", c4: "186 Leads", c5: "62 Forms", c6: "24 Enrolled", c7: "₹520", badge: "badge-active", status: "Good Reach" },
      { c1: "SRC-WALKIN", c2: "Direct Campus Walk-In Reception", sub: "Neighbourhood Families", c3: "Direct Footfall", c4: "112 Leads", c5: "88 Forms", c6: "45 Enrolled", c7: "₹0", badge: "badge-active", status: "High Intent" },
      { c1: "SRC-EXPO", c2: "World Education Fair (Pragati Maidan)", sub: "Stall #B-24 Booth", c3: "Education Expo", c4: "74 Leads", c5: "38 Forms", c6: "16 Enrolled", c7: "₹890", badge: "badge-pending", status: "Moderate" },
      { c1: "SRC-HOARDING", c2: "Metro Pillar Banners (Sector 12 & 14)", sub: "Outdoor Display 90 Days", c3: "Outdoor Print", c4: "42 Leads", c5: "18 Forms", c6: "8 Enrolled", c7: "₹1,240", badge: "badge-pending", status: "Brand Aware" },
      { c1: "SRC-NEWSPAPER", c2: "Hindustan Times School Guide", sub: "Quarter Page Sunday Insert", c3: "Print Media", c4: "18 Leads", c5: "10 Forms", c6: "4 Enrolled", c7: "₹1,850", badge: "badge-pending", status: "High Cost" },
      { c1: "SRC-ALUMNI", c2: "DPGA Alumni Association Portal", sub: "Second Generation Kids", c3: "Alumni Network", c4: "22 Leads", c5: "20 Forms", c6: "18 Enrolled", c7: "₹0", badge: "badge-active", status: "100% Converted" }
    ]
  },

  // 4. online-applications.php
  'online-applications.php': {
    title: 'Online Applications',
    icon: 'bi-laptop',
    actionBtnText: 'New Online Form',
    actionBtnIcon: 'bi-plus-lg',
    desc: 'Web portal registration forms, uploaded applicant documents, and online gateway fee payments',
    kpi1: { title: "Portal Submissions", val: "684 Applications", trend: "Session 2025-2026", icon: "bi-globe", color: "kpi-primary" },
    kpi2: { title: "Application Fee Paid", val: "₹8,55,000", trend: "₹1,250 / Registration", icon: "bi-check2-circle", color: "kpi-success" },
    kpi3: { title: "Draft Incomplete", val: "86 Abandoned", trend: "Automated SMS Sent", icon: "bi-hourglass-split", color: "kpi-warning" },
    kpi4: { title: "Scrutiny Cleared", val: "542 Approved", trend: "Moved to Verification", icon: "bi-patch-check-fill", color: "kpi-info" },
    filterPlaceholder: "Search application #, applicant name, grade, mobile...",
    filterOptions: ["All Target Grades", "Pre-Primary (Nursery - Prep)", "Primary Wing (Class 1 - 5)", "Middle Wing (Class 6 - 8)", "Secondary (Class 9 - 10)", "Senior Secondary (Class 11 - 12)"],
    filterOptionName: "Academic Grade",
    statusFilterOptions: ["All Status", "Fee Paid & Submitted", "Scrutiny Approved", "Documents Due", "Payment Pending", "Under Review"],
    headers: ["Portal App #", "Candidate Full Name", "Target Grade", "Parent Name & Mobile", "Payment Ref #", "Doc Uploads", "Submitted At", "Status"],
    rows: [
      { c1: "ONL-2025-0684", c2: "Advik Agarwal", sub: "Class 1 - Nursery", c3: "Pre-Primary Wing", c4: "Sanjay Agarwal (+91 98112 44556)", c5: "RZP-PAY-94812", c6: "4 of 4 Verified", c7: "28 Oct (09:45 AM)", badge: "badge-active", status: "Fee Paid" },
      { c1: "ONL-2025-0683", c2: "Saanvi Reddy", sub: "Class 6 - Middle", c3: "Middle Wing", c4: "Dr. K. S. Reddy (+91 98223 55667)", c5: "RZP-PAY-94801", c6: "4 of 4 Verified", c7: "27 Oct (04:12 PM)", badge: "badge-active", status: "Shortlisted" },
      { c1: "ONL-2025-0682", c2: "Reyansh Joshi", sub: "Class 11 - Science (PCM)", c3: "Senior Secondary", c4: "Mahesh Joshi (+91 98334 66778)", c5: "RZP-PAY-94788", c6: "3 of 4 (TC Pending)", c7: "26 Oct (08:30 PM)", badge: "badge-pending", status: "Scrutiny" },
      { c1: "ONL-2025-0681", c2: "Prisha Nair", sub: "Class 11 - Commerce", c3: "Senior Secondary", c4: "Gopalan Nair (+91 98445 77889)", c5: "RZP-PAY-94754", c6: "4 of 4 Verified", c7: "25 Oct (11:20 AM)", badge: "badge-active", status: "Shortlisted" },
      { c1: "ONL-2025-0680", c2: "Arya Deshmukh", sub: "Class 9 - Secondary", c3: "Secondary Wing", c4: "Sunil Deshmukh (+91 98556 88990)", c5: "RZP-PAY-94732", c6: "4 of 4 Verified", c7: "25 Oct (02:15 PM)", badge: "badge-active", status: "Fee Paid" },
      { c1: "ONL-2025-0679", c2: "Kabir Mehta", sub: "Class 3 - Primary", c3: "Primary Wing", c4: "Rakesh Mehta (+91 98667 99001)", c5: "RZP-PAY-94711", c6: "4 of 4 Verified", c7: "24 Oct (10:05 AM)", badge: "badge-active", status: "Shortlisted" },
      { c1: "ONL-2025-0678", c2: "Zara Khan", sub: "Class 11 - Humanities", c3: "Senior Secondary", c4: "Tariq Khan (+91 98778 11223)", c5: "RZP-PAY-94695", c6: "4 of 4 Verified", c7: "23 Oct (06:40 PM)", badge: "badge-active", status: "Fee Paid" },
      { c1: "ONL-2025-0677", c2: "Ayaan Sen", sub: "Class 1 - Prep", c3: "Pre-Primary Wing", c4: "Debashis Sen (+91 98889 22334)", c5: "RZP-PAY-94672", c6: "4 of 4 Verified", c7: "22 Oct (01:15 PM)", badge: "badge-pending", status: "Scrutiny" }
    ]
  },

  // 5. offline-applications.php
  'offline-applications.php': {
    title: 'Offline Applications',
    icon: 'bi-file-earmark-person-fill',
    actionBtnText: 'Enter Physical Form',
    actionBtnIcon: 'bi-plus-lg',
    desc: 'Paper registration forms submitted at the campus reception, counter fee receipts, and manual entry logs',
    kpi1: { title: "Counter Forms Sold", val: "180 Kits", trend: "₹1,250 / Brochure", icon: "bi-journal-bookmark-fill", color: "kpi-primary" },
    kpi2: { title: "Forms Received", val: "158 Physical", trend: "87.7% Return Rate", icon: "bi-inboxes-fill", color: "kpi-info" },
    kpi3: { title: "Digitized Today", val: "24 Forms", trend: "Scanned & Verified", icon: "bi-qr-code-scan", color: "kpi-success" },
    kpi4: { title: "Pending Data Entry", val: "6 Forms", trend: "Counter Scrutiny Desk", icon: "bi-keyboard-fill", color: "kpi-warning" },
    filterPlaceholder: "Search counter slip #, student name, receiving clerk...",
    filterOptions: ["All Payment Modes", "Cash Payment", "POS Card Swipe", "UPI QR Code", "Demand Draft"],
    filterOptionName: "Payment Mode",
    statusFilterOptions: ["All Status", "Digitized & Verified", "Data Entry Pending", "Documents Incomplete", "Archived"],
    headers: ["Receipt Slip #", "Candidate Full Name", "Grade Applied", "Parent / Guardian", "Counter Officer", "Payment Mode", "Received Date", "Status"],
    rows: [
      { c1: "OFF-2025-0158", c2: "Raghav Malhotra", sub: "Class 2 - Primary", c3: "Primary Wing", c4: "Anil Malhotra (+91 98114 33221)", c5: "Ritu Sharma (Counter 1)", c6: "UPI QR (₹1,250)", c7: "28 Oct 2024", badge: "badge-active", status: "Digitized" },
      { c1: "OFF-2025-0157", c2: "Suhani Bhatnagar", sub: "Class 11 - PCB", c3: "Senior Secondary", c4: "Dr. V. K. Bhatnagar", c5: "Amit Verma (Counter 2)", c6: "POS Card Swipe", c7: "28 Oct 2024", badge: "badge-pending", status: "Data Entry" },
      { c1: "OFF-2025-0156", c2: "Shaurya Pratap Singh", sub: "Class 7 - Middle", c3: "Middle Wing", c4: "Col. D. S. Pratap", c5: "Ritu Sharma (Counter 1)", c6: "Cash (₹1,250)", c7: "27 Oct 2024", badge: "badge-active", status: "Digitized" },
      { c1: "OFF-2025-0155", c2: "Dia Mukherjee", sub: "Class 1 - Nursery", c3: "Pre-Primary Wing", c4: "Pranab Mukherjee", c5: "Ritu Sharma (Counter 1)", c6: "UPI QR (₹1,250)", c7: "27 Oct 2024", badge: "badge-active", status: "Digitized" },
      { c1: "OFF-2025-0154", c2: "Vivaan Saxena", sub: "Class 11 - Commerce", c3: "Senior Secondary", c4: "Rajesh Saxena", c5: "Amit Verma (Counter 2)", c6: "Demand Draft", c7: "26 Oct 2024", badge: "badge-active", status: "Digitized" },
      { c1: "OFF-2025-0153", c2: "Gauri Shankar", sub: "Class 5 - Primary", c3: "Primary Wing", c4: "N. Shankar", c5: "Ritu Sharma (Counter 1)", c6: "Cash (₹1,250)", c7: "26 Oct 2024", badge: "badge-pending", status: "Data Entry" },
      { c1: "OFF-2025-0152", c2: "Arnav Khurana", sub: "Class 10 - Secondary", c3: "Secondary Wing", c4: "Harish Khurana", c5: "Amit Verma (Counter 2)", c6: "POS Card Swipe", c7: "25 Oct 2024", badge: "badge-active", status: "Digitized" },
      { c1: "OFF-2025-0151", c2: "Tara Ahluwalia", sub: "Class 1 - Prep", c3: "Pre-Primary Wing", c4: "Jaspreet Ahluwalia", c5: "Ritu Sharma (Counter 1)", c6: "UPI QR (₹1,250)", c7: "25 Oct 2024", badge: "badge-active", status: "Digitized" }
    ]
  },

  // 6. application-review.php
  'application-review.php': {
    title: 'Application Review',
    icon: 'bi-clipboard-check-fill',
    actionBtnText: 'Review Dossier',
    actionBtnIcon: 'bi-check2-all',
    desc: 'Admissions scrutiny committee evaluations, eligibility checks, and entrance test approvals',
    kpi1: { title: "Dossiers Reviewed", val: "842 Evaluated", trend: "100% Phase 1 Cleared", icon: "bi-check2-all", color: "kpi-primary" },
    kpi2: { title: "Approved for Test", val: "520 Candidates", trend: "61.7% Met Criteria", icon: "bi-pencil-square", color: "kpi-success" },
    kpi3: { title: "Documents Pending", val: "38 Flagged", trend: "TC / Birth Cert Discrepancy", icon: "bi-flag-fill", color: "kpi-warning" },
    kpi4: { title: "Disqualified", val: "14 Ineligible", trend: "Age Cutoff / Incomplete", icon: "bi-x-circle-fill", color: "kpi-danger" },
    filterPlaceholder: "Search dossier #, candidate, scrutiny officer...",
    filterOptions: ["All Scrutiny Status", "Approved for Test", "Under Secondary Review", "Documentation Pending", "Age Ineligible", "Disqualified"],
    filterOptionName: "Review Verdict",
    statusFilterOptions: ["All Status", "Approved", "Flagged", "Under Review", "Rejected"],
    headers: ["Dossier #", "Candidate Full Name", "Target Grade", "Previous Board / School", "Last Academic Score", "Reviewing Officer", "Review Date", "Verdict"],
    rows: [
      { c1: "REV-2025-0412", c2: "Advik Agarwal", sub: "Age: 3y 8m (Nursery)", c3: "Pre-Primary Wing", c4: "Direct Admission (Age Verified)", c5: "N/A (Early Years)", c6: "Mrs. Shalini Verma", c7: "28 Oct 2024", badge: "badge-active", status: "Approved" },
      { c1: "REV-2025-0411", c2: "Saanvi Reddy", sub: "Age: 11y 2m (Class 6)", c3: "Middle Wing", c4: "St. Xavier's High (ICSE)", c5: "94.2% (Grade 5)", c6: "Dr. K. L. Sharma", c7: "27 Oct 2024", badge: "badge-active", status: "Approved" },
      { c1: "REV-2025-0410", c2: "Reyansh Joshi", sub: "Age: 16y 1m (Class 11)", c3: "Senior Secondary", c4: "Delhi Public School (CBSE)", c5: "91.8% (Class 10 Board)", c6: "HOD Science Panel", c7: "26 Oct 2024", badge: "badge-pending", status: "TC Pending" },
      { c1: "REV-2025-0409", c2: "Prisha Nair", sub: "Age: 15y 11m (Class 11)", c3: "Senior Secondary", c4: "Modern School (CBSE)", c5: "88.4% (Class 10 Board)", c6: "HOD Commerce Panel", c7: "25 Oct 2024", badge: "badge-active", status: "Approved" },
      { c1: "REV-2025-0408", c2: "Arya Deshmukh", sub: "Age: 14y 3m (Class 9)", c3: "Secondary Wing", c4: "Kendriya Vidyalaya (CBSE)", c5: "85.6% (Class 8)", c6: "Secondary Wing Head", c7: "25 Oct 2024", badge: "badge-active", status: "Approved" },
      { c1: "REV-2025-0407", c2: "Kabir Mehta", sub: "Age: 8y 4m (Class 3)", c3: "Primary Wing", c4: "The Heritage School (CBSE)", c5: "Grade A+ (Class 2)", c6: "Mrs. Shalini Verma", c7: "24 Oct 2024", badge: "badge-active", status: "Approved" },
      { c1: "REV-2025-0406", c2: "Zara Khan", sub: "Age: 16y 2m (Class 11)", c3: "Senior Secondary", c4: "Ryan International (CBSE)", c5: "92.0% (Class 10)", c6: "HOD Humanities", c7: "23 Oct 2024", badge: "badge-active", status: "Approved" },
      { c1: "REV-2025-0405", c2: "Ayaan Sen", sub: "Age: 4y 6m (Prep)", c3: "Pre-Primary Wing", c4: "Kidzee Preschool", c5: "Pre-K Certified", c6: "Mrs. Shalini Verma", c7: "22 Oct 2024", badge: "badge-active", status: "Approved" }
    ]
  },

  // 7. document-verification.php
  'document-verification.php': {
    title: 'Document Verification',
    icon: 'bi-patch-check-fill',
    actionBtnText: 'Verify New Dossier',
    actionBtnIcon: 'bi-patch-check-fill',
    desc: 'Mandatory statutory CBSE compliance: Birth certificate, Aadhaar/APAAR ID, TC, and medical fitness records',
    kpi1: { title: "Verified Dossiers", val: "410 Complete", trend: "100% CBSE Statutory", icon: "bi-shield-check", color: "kpi-success" },
    kpi2: { title: "APAAR IDs Linked", val: "398 Students", trend: "MoE One Nation One ID", icon: "bi-fingerprint", color: "kpi-primary" },
    kpi3: { title: "Pending School TC", val: "14 Candidates", trend: "Counter-Signed Awaited", icon: "bi-file-earmark-medical-fill", color: "kpi-warning" },
    kpi4: { title: "Medical Fitness Logs", val: "402 Verified", trend: "Pediatric Form Filed", icon: "bi-heart-pulse-fill", color: "kpi-info" },
    filterPlaceholder: "Search document ID, candidate name, APAAR #...",
    filterOptions: ["All Verification Status", "Fully Verified (Clear)", "Transfer Certificate Pending", "Medical Record Incomplete", "Address Proof Resubmit"],
    filterOptionName: "Verification Status",
    statusFilterOptions: ["All Status", "Verified", "Pending TC", "Medical Form Due", "Flagged"],
    headers: ["Verification ID", "Candidate Full Name", "Target Grade", "Birth Cert UID", "APAAR / Aadhaar UID", "Previous TC Status", "Verifying Officer", "Status"],
    rows: [
      { c1: "DOC-2025-0412", c2: "Advik Agarwal", sub: "Pre-Primary Wing", c3: "Class 1 - Nursery", c4: "MCD/B-2021/94821", c5: "APAAR: 8492 1048 2910", c6: "N/A (Fresh Admission)", c7: "Rohan Vashisht (Registrar)", badge: "badge-active", status: "Verified" },
      { c1: "DOC-2025-0411", c2: "Saanvi Reddy", sub: "Middle Wing", c3: "Class 6 - Middle", c4: "GHMC/2013/84920", c5: "APAAR: 4892 3910 4821", c6: "Counter-Signed TC #4910", c7: "Rohan Vashisht (Registrar)", badge: "badge-active", status: "Verified" },
      { c1: "DOC-2025-0410", c2: "Reyansh Joshi", sub: "Senior Secondary", c3: "Class 11 - Science (PCM)", c4: "NDMC/2008/10492", c5: "APAAR: 1948 2910 4829", c6: "Awaited from DPS (Exp 30 Oct)", c7: "Sunil Joshi (Verification)", badge: "badge-pending", status: "Pending TC" },
      { c1: "DOC-2025-0409", c2: "Prisha Nair", sub: "Senior Secondary", c3: "Class 11 - Commerce", c4: "MCGM/2008/49201", c5: "APAAR: 9482 1049 3920", c6: "Verified Original TC #841", c7: "Rohan Vashisht (Registrar)", badge: "badge-active", status: "Verified" },
      { c1: "DOC-2025-0408", c2: "Arya Deshmukh", sub: "Secondary Wing", c3: "Class 9 - Secondary", c4: "PMC/2010/84920", c5: "APAAR: 3910 4829 1048", c6: "Verified Original TC #204", c7: "Sunil Joshi (Verification)", badge: "badge-active", status: "Verified" },
      { c1: "DOC-2025-0407", c2: "Kabir Mehta", sub: "Primary Wing", c3: "Class 3 - Primary", c4: "EDMC/2016/49201", c5: "APAAR: 2940 1849 3920", c6: "Verified Original TC #912", c7: "Rohan Vashisht (Registrar)", badge: "badge-active", status: "Verified" },
      { c1: "DOC-2025-0406", c2: "Zara Khan", sub: "Senior Secondary", c3: "Class 11 - Humanities", c4: "SDMC/2008/19482", c5: "APAAR: 9401 2940 1849", c6: "Verified Original TC #412", c7: "Sunil Joshi (Verification)", badge: "badge-active", status: "Verified" },
      { c1: "DOC-2025-0405", c2: "Ayaan Sen", sub: "Pre-Primary Wing", c3: "Class 1 - Prep", c4: "KMC/2020/49201", c5: "APAAR: 1849 3920 4810", c6: "N/A (Pre-K Cert Attached)", c7: "Rohan Vashisht (Registrar)", badge: "badge-active", status: "Verified" }
    ]
  },

  // 8. admission-approval.php
  'admission-approval.php': {
    title: 'Admission Approval',
    icon: 'bi-check2-circle',
    actionBtnText: 'Grant Admission',
    actionBtnIcon: 'bi-shield-check',
    desc: 'Principal sanction authority, Management Committee clearances, and formal admission confirmation orders',
    kpi1: { title: "Sanction Orders", val: "184 Confirmed", trend: "Principal Certified", icon: "bi-patch-check-fill", color: "kpi-success" },
    kpi2: { title: "Management Quota", val: "12 Seats", trend: "Trust Board Approved", icon: "bi-building-check", color: "kpi-info" },
    kpi3: { title: "Sibling Concessions", val: "28 Students", trend: "15% Sibling Fee Rebate", icon: "bi-people", color: "kpi-primary" },
    kpi4: { title: "Awaiting Clearance", val: "16 Dossiers", trend: "On Principal Desk", icon: "bi-pen-fill", color: "kpi-warning" },
    filterPlaceholder: "Search sanction order #, candidate name, quota...",
    filterOptions: ["All Quota Categories", "General Merit Quota", "Sibling & Staff Quota", "Defense & Paramilitary", "Management Quota", "EWS / RTE Quota"],
    filterOptionName: "Admission Quota",
    statusFilterOptions: ["All Status", "Officially Sanctioned", "Pending Principal Sign", "Conditionally Approved", "Declined"],
    headers: ["Sanction Order #", "Candidate Full Name", "Grade & Wing", "Merit Rank / Score", "Quota Category", "Approving Authority", "Sanction Date", "Status"],
    rows: [
      { c1: "SNC-2025-0184", c2: "Advik Agarwal", sub: "Class 1 - Nursery", c3: "Pre-Primary Wing", c4: "Merit Score: 98/100", c5: "General Merit Quota", c6: "Dr. Ananya Roy (Principal)", c7: "28 Oct 2024", badge: "badge-active", status: "Sanctioned" },
      { c1: "SNC-2025-0183", c2: "Saanvi Reddy", sub: "Class 6 - Middle", c3: "Middle Wing", c4: "Merit Rank: #04", c5: "Sibling Quota (Elder in Cl 9)", c6: "Dr. Ananya Roy (Principal)", c7: "27 Oct 2024", badge: "badge-active", status: "Sanctioned" },
      { c1: "SNC-2025-0182", c2: "Reyansh Joshi", sub: "Class 11 - Science (PCM)", c3: "Senior Secondary", c4: "Merit Score: 92/100", c5: "General Merit Quota", c6: "Dean Academics & Principal", c7: "26 Oct 2024", badge: "badge-pending", status: "Conditional (TC)" },
      { c1: "SNC-2025-0181", c2: "Prisha Nair", sub: "Class 11 - Commerce", c3: "Senior Secondary", c4: "Merit Rank: #12", c5: "General Merit Quota", c6: "Dr. Ananya Roy (Principal)", c7: "25 Oct 2024", badge: "badge-active", status: "Sanctioned" },
      { c1: "SNC-2025-0180", c2: "Arya Deshmukh", sub: "Class 9 - Secondary", c3: "Secondary Wing", c4: "Merit Rank: #08", c5: "Defense Quota (Army)", c6: "Dr. Ananya Roy (Principal)", c7: "25 Oct 2024", badge: "badge-active", status: "Sanctioned" },
      { c1: "SNC-2025-0179", c2: "Kabir Mehta", sub: "Class 3 - Primary", c3: "Primary Wing", c4: "Merit Score: 95/100", c5: "General Merit Quota", c6: "Dr. Ananya Roy (Principal)", c7: "24 Oct 2024", badge: "badge-active", status: "Sanctioned" },
      { c1: "SNC-2025-0178", c2: "Zara Khan", sub: "Class 11 - Humanities", c3: "Senior Secondary", c4: "Merit Rank: #02", c5: "General Merit Quota", c6: "Dr. Ananya Roy (Principal)", c7: "23 Oct 2024", badge: "badge-active", status: "Sanctioned" },
      { c1: "SNC-2025-0177", c2: "Ayaan Sen", sub: "Class 1 - Prep", c3: "Pre-Primary Wing", c4: "Merit Score: 96/100", c5: "Alumni Quota (Batch 2008)", c6: "Dr. Ananya Roy (Principal)", c7: "22 Oct 2024", badge: "badge-active", status: "Sanctioned" }
    ]
  },

  // 9. merit-lists.php
  'merit-lists.php': {
    title: 'Merit Lists',
    icon: 'bi-award-fill',
    actionBtnText: 'Publish Merit List',
    actionBtnIcon: 'bi-award-fill',
    desc: 'Entrance exam cutoffs, composite scoring rubrics, ranking sheets, and selection batch publications',
    kpi1: { title: "General Cutoff", val: "88.5% Score", trend: "Session Benchmark", icon: "bi-award-fill", color: "kpi-primary" },
    kpi2: { title: "Published Batches", val: "3 Lists", trend: "Round 1, 2 & Sibling", icon: "bi-clipboard2-check-fill", color: "kpi-info" },
    kpi3: { title: "Offers Extended", val: "320 Candidates", trend: "220 Target Intake", icon: "bi-envelope-check-fill", color: "kpi-success" },
    kpi4: { title: "Offer Acceptance", val: "57.5%", trend: "184 Formally Enrolled", icon: "bi-check2-circle", color: "kpi-warning" },
    filterPlaceholder: "Search merit rank, candidate name, category...",
    filterOptions: ["All Merit Batches", "Batch 1: General Merit (90%+)", "Batch 2: Second Cutoff (85-89%)", "Batch 3: Sibling & Alumni Quota", "Batch 4: Sports & Talent Quota"],
    filterOptionName: "Merit Batch",
    statusFilterOptions: ["All Status", "Offer Extended", "Enrolled & Fee Paid", "Offer Expired", "Offer Declined"],
    headers: ["Merit Rank #", "Candidate Full Name", "Target Grade", "Entrance Test (%)", "Composite Score", "Selection Quota", "Offer Validity", "Status"],
    rows: [
      { c1: "RANK #01", c2: "Advik Agarwal", sub: "Class 1 - Nursery", c3: "Pre-Primary Wing", c4: "100.0% (Observation)", c5: "98.5 Points", c6: "General Merit", c7: "Offer Accepted", badge: "badge-active", status: "Enrolled" },
      { c1: "RANK #02", c2: "Zara Khan", sub: "Class 11 - Humanities", c3: "Senior Secondary", c4: "96.5% (Aptitude)", c5: "96.0 Points", c6: "General Merit", c7: "Offer Accepted", badge: "badge-active", status: "Enrolled" },
      { c1: "RANK #03", c2: "Kabir Mehta", sub: "Class 3 - Primary", c3: "Primary Wing", c4: "95.0% (Diagnostic)", c5: "95.2 Points", c6: "General Merit", c7: "Offer Accepted", badge: "badge-active", status: "Enrolled" },
      { c1: "RANK #04", c2: "Saanvi Reddy", sub: "Class 6 - Middle", c3: "Middle Wing", c4: "94.5% (Math/Sci)", c5: "94.8 Points", c6: "Sibling Quota", c7: "Offer Accepted", badge: "badge-active", status: "Enrolled" },
      { c1: "RANK #05", c2: "Ayaan Sen", sub: "Class 1 - Prep", c3: "Pre-Primary Wing", c4: "94.0% (Interactive)", c5: "94.0 Points", c6: "Alumni Quota", c7: "Offer Accepted", badge: "badge-active", status: "Enrolled" },
      { c1: "RANK #06", c2: "Reyansh Joshi", sub: "Class 11 - Science (PCM)", c3: "Senior Secondary", c4: "93.0% (Physics/Math)", c5: "93.2 Points", c6: "General Merit", c7: "Valid till 30 Oct", badge: "badge-pending", status: "Offered" },
      { c1: "RANK #07", c2: "Prisha Nair", sub: "Class 11 - Commerce", c3: "Senior Secondary", c4: "91.5% (Accounts/Eng)", c5: "91.8 Points", c6: "General Merit", c7: "Offer Accepted", badge: "badge-active", status: "Enrolled" },
      { c1: "RANK #08", c2: "Arya Deshmukh", sub: "Class 9 - Secondary", c3: "Secondary Wing", c4: "90.0% (General Apt)", c5: "90.5 Points", c6: "Defense Quota", c7: "Offer Accepted", badge: "badge-active", status: "Enrolled" }
    ]
  },

  // 10. waiting-lists.php
  'waiting-lists.php': {
    title: 'Waiting Lists',
    icon: 'bi-hourglass-split',
    actionBtnText: 'Add to Waitlist',
    actionBtnIcon: 'bi-hourglass-top',
    desc: 'Reserve applicant roster, vacancy reallocation tracking, and movement notifications',
    kpi1: { title: "Waitlisted Students", val: "64 Candidates", trend: "Across All 5 Wings", icon: "bi-hourglass-top", color: "kpi-primary" },
    kpi2: { title: "Cleared to Merit", val: "18 Candidates", trend: "Round 1 Cancellations", icon: "bi-arrow-up-circle-fill", color: "kpi-success" },
    kpi3: { title: "Highest Demand", val: "Nursery & Cl 11", trend: "Zero Seats Left in PCM", icon: "bi-exclamation-circle-fill", color: "kpi-warning" },
    kpi4: { title: "Next Drop Date", val: "02 Nov 2024", trend: "Batch 2 Vacancy Round", icon: "bi-calendar-event-fill", color: "kpi-info" },
    filterPlaceholder: "Search waitlist token, student, applied grade...",
    filterOptions: ["All Grades", "Pre-Primary (WL 1-12)", "Primary Wing (WL 1-15)", "Middle Wing (WL 1-10)", "Secondary (WL 1-8)", "Senior Secondary (WL 1-19)"],
    filterOptionName: "Grade Waitlist",
    statusFilterOptions: ["All Status", "Active on Waitlist", "Cleared for Admission", "Withdrawn by Parent", "Expired"],
    headers: ["Waitlist Token", "Candidate Full Name", "Target Grade", "Parent Mobile", "Position #", "Cutoff Gap", "Valid Till", "Status"],
    rows: [
      { c1: "WL-2025-001", c2: "Darsh Khandelwal", sub: "Class 11 - Science (PCM)", c3: "Senior Secondary", c4: "+91 98112 77881", c5: "Position #01", c6: "-0.5% from Cutoff", c7: "02 Nov 2024", badge: "badge-active", status: "Next in Line" },
      { c1: "WL-2025-002", c2: "Ananya Saxena", sub: "Class 1 - Nursery", c3: "Pre-Primary Wing", c4: "+91 98223 88992", c5: "Position #01", c6: "-1.0 Pt from Cutoff", c7: "02 Nov 2024", badge: "badge-active", status: "Next in Line" },
      { c1: "WL-2025-003", c2: "Kavya Swaminathan", sub: "Class 6 - Middle", c3: "Middle Wing", c4: "+91 98334 99003", c5: "Position #02", c6: "-1.2% from Cutoff", c7: "02 Nov 2024", badge: "badge-pending", status: "Waiting" },
      { c1: "WL-2025-004", c2: "Rohan Varghese", sub: "Class 9 - Secondary", c3: "Secondary Wing", c4: "+91 98445 11224", c5: "Position #01", c6: "-0.8% from Cutoff", c7: "02 Nov 2024", badge: "badge-active", status: "Cleared Offer" },
      { c1: "WL-2025-005", c2: "Parth Somani", sub: "Class 11 - Commerce", c3: "Senior Secondary", c4: "+91 98556 22335", c5: "Position #03", c6: "-1.8% from Cutoff", c7: "02 Nov 2024", badge: "badge-pending", status: "Waiting" },
      { c1: "WL-2025-006", c2: "Kiara Advani", sub: "Class 4 - Primary", c3: "Primary Wing", c4: "+91 98667 33446", c5: "Position #02", c6: "-1.5% from Cutoff", c7: "02 Nov 2024", badge: "badge-pending", status: "Waiting" },
      { c1: "WL-2025-007", c2: "Manav Chhabra", sub: "Class 11 - Humanities", c3: "Senior Secondary", c4: "+91 98778 44557", c5: "Position #01", c6: "-0.6% from Cutoff", c7: "02 Nov 2024", badge: "badge-active", status: "Cleared Offer" },
      { c1: "WL-2025-008", c2: "Avani Rastogi", sub: "Class 1 - Prep", c3: "Pre-Primary Wing", c4: "+91 98889 55668", c5: "Position #04", c6: "-2.2 Pts from Cutoff", c7: "02 Nov 2024", badge: "badge-pending", status: "Waiting" }
    ]
  },

  // 11. prospectus-distribution.php
  'prospectus-distribution.php': {
    title: 'Prospectus Distribution',
    icon: 'bi-book-half',
    actionBtnText: 'Issue Prospectus',
    actionBtnIcon: 'bi-journal-plus',
    desc: 'Information brochure sales, registration kit inventory, and counter cashier reconciliations',
    kpi1: { title: "Total Printed", val: "500 Kits", trend: "Deluxe Gloss Brochure", icon: "bi-book-half", color: "kpi-primary" },
    kpi2: { title: "Kits Distributed", val: "380 Issued", trend: "76% Stock Utilized", icon: "bi-cart-check-fill", color: "kpi-success" },
    kpi3: { title: "Counter Inventory", val: "120 Left", trend: "Main Admin Vault", icon: "bi-archive-fill", color: "kpi-info" },
    kpi4: { title: "Revenue Collected", val: "₹4,75,000", trend: "₹1,250 / Information Kit", icon: "bi-cash-coin", color: "kpi-warning" },
    filterPlaceholder: "Search kit serial #, buyer parent, counter cashier...",
    filterOptions: ["All Prospectus Types", "Main School Information Kit", "Senior Secondary Stream Dossier", "Pre-Primary Day Care Booklet"],
    filterOptionName: "Brochure Category",
    statusFilterOptions: ["All Status", "Sold / Issued", "Complimentary Sibling", "Damaged / Voided", "In Vault"],
    headers: ["Kit Serial #", "Prospectus Package", "Target Wing", "Recipient / Parent", "Amount Paid (₹)", "Issuing Desk", "Issue Date", "Status"],
    rows: [
      { c1: "KIT-2025-0380", c2: "Comprehensive DPGA Information Kit", sub: "Includes CBSE Curriculum Guide", c3: "Pre-Primary Wing", c4: "Sanjay Agarwal", c5: "₹1,250", c6: "Counter 1 (Ritu Sharma)", c7: "28 Oct 2024", badge: "badge-active", status: "Issued" },
      { c1: "KIT-2025-0379", c2: "Senior Secondary Stream Dossier", sub: "PCM/PCB/Commerce Special", c3: "Senior Secondary", c4: "Dr. K. S. Reddy", c5: "₹1,250", c6: "Counter 2 (Amit Verma)", c7: "27 Oct 2024", badge: "badge-active", status: "Issued" },
      { c1: "KIT-2025-0378", c2: "Comprehensive DPGA Information Kit", sub: "With Fee Matrix 2025-26", c3: "Senior Secondary", c4: "Mahesh Joshi", c5: "₹1,250", c6: "Counter 1 (Ritu Sharma)", c7: "26 Oct 2024", badge: "badge-active", status: "Issued" },
      { c1: "KIT-2025-0377", c2: "Comprehensive DPGA Information Kit", sub: "Standard Prospectus Package", c3: "Senior Secondary", c4: "Gopalan Nair", c5: "₹1,250", c6: "Counter 1 (Ritu Sharma)", c7: "25 Oct 2024", badge: "badge-active", status: "Issued" },
      { c1: "KIT-2025-0376", c2: "Comprehensive DPGA Information Kit", sub: "Standard Prospectus Package", c3: "Secondary Wing", c4: "Sunil Deshmukh", c5: "₹1,250", c6: "Counter 2 (Amit Verma)", c7: "25 Oct 2024", badge: "badge-active", status: "Issued" },
      { c1: "KIT-2025-0375", c2: "Primary School Handbook", sub: "With Co-Curricular Brochure", c3: "Primary Wing", c4: "Rakesh Mehta", c5: "₹1,250", c6: "Counter 1 (Ritu Sharma)", c7: "24 Oct 2024", badge: "badge-active", status: "Issued" },
      { c1: "KIT-2025-0374", c2: "Comprehensive DPGA Information Kit", sub: "Complimentary Sibling Copy", c3: "Senior Secondary", c4: "Tariq Khan", c5: "₹0 (Sibling)", c6: "Counter 2 (Amit Verma)", c7: "23 Oct 2024", badge: "badge-active", status: "Complimentary" },
      { c1: "KIT-2025-0373", c2: "Early Years Foundation Brochure", sub: "Day Care & Activity Center", c3: "Pre-Primary Wing", c4: "Debashis Sen", c5: "₹1,250", c6: "Counter 1 (Ritu Sharma)", c7: "22 Oct 2024", badge: "badge-active", status: "Issued" }
    ]
  },

  // 12. campus-visits.php
  'campus-visits.php': {
    title: 'Campus Visits',
    icon: 'bi-geo-alt-fill',
    actionBtnText: 'Book Campus Tour',
    actionBtnIcon: 'bi-calendar2-week',
    desc: 'Guided parent tours, laboratory demonstrations, sports complex inspections, and visit feedback',
    kpi1: { title: "Tours Conducted", val: "142 Families", trend: "Spring Intake Season", icon: "bi-building-fill-check", color: "kpi-primary" },
    kpi2: { title: "Visitor Satisfaction", val: "4.9 / 5.0", trend: "98% Positive Feedback", icon: "bi-star-fill", color: "kpi-warning" },
    kpi3: { title: "Tours Today", val: "6 Scheduled", trend: "3 Morning / 3 Afternoon", icon: "bi-calendar-event", color: "kpi-info" },
    kpi4: { title: "Tour-to-Form Yield", val: "74.2%", trend: "High Conversion Impact", icon: "bi-arrow-right-circle-fill", color: "kpi-success" },
    filterPlaceholder: "Search visit slot #, family name, tour guide...",
    filterOptions: ["All Visit Times", "Morning Slot (09:30 - 11:30)", "Noon Slot (12:00 - 01:30)", "Afternoon Slot (02:30 - 04:30)"],
    filterOptionName: "Tour Slot",
    statusFilterOptions: ["All Status", "Completed & Feedback Logged", "In Progress", "Scheduled Today", "Rescheduled", "No Show"],
    headers: ["Visit Booking #", "Visiting Family", "Grade of Interest", "Key Facility Focus", "Tour Guide Officer", "Scheduled Slot", "Visitor Rating", "Status"],
    rows: [
      { c1: "VIS-2025-0142", c2: "Mr. & Mrs. Singhania", sub: "Candidate: Aarav (Nursery)", c3: "Pre-Primary Wing", c4: "Smart Kindergarten & Splash Pool", c5: "Pooja Hegde (Ambassador)", c6: "28 Oct (10:30 AM)", badge: "badge-active", status: "Completed (5★)" },
      { c1: "VIS-2025-0141", c2: "Dr. K. S. Reddy & Family", sub: "Candidate: Saanvi (Cl 6)", c3: "Middle Wing", c4: "Atal Tinkering Lab & Robotics", c5: "Kunal Bansal (Science Lead)", c6: "28 Oct (11:30 AM)", badge: "badge-active", status: "Completed (5★)" },
      { c1: "VIS-2025-0140", c2: "Mr. Alok Bhardwaj", sub: "Candidate: Devansh (Cl 11)", c3: "Senior Secondary", c4: "Physics/Chemistry Labs & Hostel", c5: "Sunil Joshi (Admin Officer)", c6: "28 Oct (02:30 PM)", badge: "badge-pending", status: "In Progress" },
      { c1: "VIS-2025-0139", c2: "Mr. Sameer Deshpande", sub: "Candidate: Ananya (Cl 9)", c3: "Secondary Wing", c4: "Olympic Swimming Pool & Squash", c5: "Pooja Hegde (Ambassador)", c6: "29 Oct (10:00 AM)", badge: "badge-active", status: "Scheduled" },
      { c1: "VIS-2025-0138", c2: "Mr. Raman Choudhary", sub: "Candidate: Tanvi (Cl 11)", c3: "Senior Secondary", c4: "Library & Commerce Innovation Hub", c5: "Sunil Joshi (Admin Officer)", c6: "29 Oct (11:30 AM)", badge: "badge-active", status: "Scheduled" },
      { c1: "VIS-2025-0137", c2: "Mr. Subhash Mukherjee", sub: "Candidate: Ishaan (Cl 4)", c3: "Primary Wing", c4: "Junior Activity Hall & Transport", c5: "Pooja Hegde (Ambassador)", c6: "30 Oct (09:30 AM)", badge: "badge-active", status: "Scheduled" },
      { c1: "VIS-2025-0136", c2: "Mr. Kunal Kapoor", sub: "Candidate: Riyaan (Prep)", c3: "Pre-Primary Wing", c4: "Montessori Lab & Dining Hall", c5: "Pooja Hegde (Ambassador)", c6: "27 Oct (03:00 PM)", badge: "badge-active", status: "Completed (5★)" },
      { c1: "VIS-2025-0135", c2: "Mr. Suresh Pillai", sub: "Candidate: Navya (Cl 11)", c3: "Senior Secondary", c4: "Auditorium & Visual Arts Studio", c5: "Kunal Bansal (Science Lead)", c6: "27 Oct (11:00 AM)", badge: "badge-active", status: "Completed (4★)" }
    ]
  },

  // 13. counselling.php
  'counselling.php': {
    title: 'Admission Counselling',
    icon: 'bi-chat-dots-fill',
    actionBtnText: 'Book Counselling Slot',
    actionBtnIcon: 'bi-person-lines-fill',
    desc: 'Academic pathway consultations, CBSE stream selection advice, and parental transition guidance',
    kpi1: { title: "Sessions Logged", val: "218 Consultations", trend: "Led by Senior Faculty", icon: "bi-chat-heart-fill", color: "kpi-primary" },
    kpi2: { title: "Senior Stream Select", val: "110 Students", trend: "PCM / PCB / Commerce", icon: "bi-diagram-3-fill", color: "kpi-info" },
    kpi3: { title: "Counsellors on Duty", val: "5 Psychologists", trend: "Child Development Certified", icon: "bi-person-badge-fill", color: "kpi-success" },
    kpi4: { title: "Recommendation Score", val: "96.4%", trend: "Clear Pathway Identified", icon: "bi-check2-circle", color: "kpi-warning" },
    filterPlaceholder: "Search counselling ID, candidate, lead counsellor...",
    filterOptions: ["All Focus Areas", "Senior Secondary Stream Guidance", "Early Years School Readiness", "Curriculum Shift (ICSE to CBSE)", "Special Learning Needs (SEN)"],
    filterOptionName: "Counselling Focus",
    statusFilterOptions: ["All Status", "Recommended & Clear", "Secondary Assessment Req", "Alternative Stream Advised", "Follow-up Scheduled"],
    headers: ["Session ID", "Candidate Full Name", "Target Grade / Stream", "Lead Counsellor", "Diagnostic Profile", "Parent Interaction Summary", "Session Date", "Verdict"],
    rows: [
      { c1: "CNS-2025-0218", c2: "Advik Agarwal", sub: "Class 1 - Nursery", c3: "Early Childhood", c4: "Dr. Sunita Kapoor", c5: "High Social Readiness", c6: "Parents aligned with interactive play methodology", c7: "28 Oct 2024", badge: "badge-active", status: "Recommended" },
      { c1: "CNS-2025-0217", c2: "Saanvi Reddy", sub: "Class 6 - Middle", c3: "Middle Wing", c4: "Mrs. Shalini Verma", c5: "Strong Math & Science Affinity", c6: "Smooth transition planned from ICSE board syllabus", c7: "27 Oct 2024", badge: "badge-active", status: "Recommended" },
      { c1: "CNS-2025-0216", c2: "Reyansh Joshi", sub: "Class 11 - Science (PCM)", c3: "Senior Secondary", c4: "Dean Academics", c5: "JEE Aptitude 92nd Percentile", c6: "Advised Computer Science as 5th elective subject", c7: "26 Oct 2024", badge: "badge-active", status: "Stream Confirmed" },
      { c1: "CNS-2025-0215", c2: "Prisha Nair", sub: "Class 11 - Commerce", c3: "Senior Secondary", c4: "HOD Commerce", c5: "Strong Analytical Aptitude", c6: "Recommended Applied Mathematics with Economics", c7: "25 Oct 2024", badge: "badge-active", status: "Stream Confirmed" },
      { c1: "CNS-2025-0214", c2: "Arya Deshmukh", sub: "Class 9 - Secondary", c3: "Secondary Wing", c4: "Mrs. Shalini Verma", c5: "All-Round Academic Balance", c6: "Father in Army, fast-track academic integration", c7: "25 Oct 2024", badge: "badge-active", status: "Recommended" },
      { c1: "CNS-2025-0213", c2: "Kabir Mehta", sub: "Class 3 - Primary", c3: "Primary Wing", c4: "Dr. Sunita Kapoor", c5: "Curious, Strong Linguistic Skills", c6: "Suggested French as 3rd Language option", c7: "24 Oct 2024", badge: "badge-active", status: "Recommended" },
      { c1: "CNS-2025-0212", c2: "Zara Khan", sub: "Class 11 - Humanities", c3: "Senior Secondary", c4: "HOD Humanities", c5: "Passionate about Law & Politics", c6: "Confirmed Psychology, Political Science, Economics", c7: "23 Oct 2024", badge: "badge-active", status: "Stream Confirmed" },
      { c1: "CNS-2025-0211", c2: "Ayaan Sen", sub: "Class 1 - Prep", c3: "Early Childhood", c4: "Dr. Sunita Kapoor", c5: "High Motor Skill Development", c6: "Child comfortable in group activities and sports", c7: "22 Oct 2024", badge: "badge-active", status: "Recommended" }
    ]
  },

  // 14. admission-fees.php
  'admission-fees.php': {
    title: 'Admission Fees',
    icon: 'bi-cash-coin',
    actionBtnText: 'Collect Admission Fee',
    actionBtnIcon: 'bi-credit-card',
    desc: 'Registration fee settlements, caution deposit receipts, composite tuition challans, and bank reconciliations',
    kpi1: { title: "Fees Realized", val: "₹46,20,000", trend: "184 Enrolled Students", icon: "bi-cash-stack", color: "kpi-success" },
    kpi2: { title: "Average Fee / Student", val: "₹25,100", trend: "Admission + Caution + Term 1", icon: "bi-calculator", color: "kpi-primary" },
    kpi3: { title: "Payment Mode Split", val: "88% Online PG", trend: "Razorpay / UPI / NEFT", icon: "bi-credit-card-fill", color: "kpi-info" },
    kpi4: { title: "Pending Challans", val: "14 Expiring", trend: "₹3,51,400 Due Today", icon: "bi-clock-history", color: "kpi-warning" },
    filterPlaceholder: "Search challan #, candidate name, txn reference...",
    filterOptions: ["All Fee Categories", "Full First Term Settlement", "Registration & Admission Only", "Security Caution Deposit", "Sibling Discount Slabs"],
    filterOptionName: "Fee Slab",
    statusFilterOptions: ["All Status", "Settled & Receipt Generated", "Challan Pending", "Bank Reconciliation Due", "Failed / Refunded"],
    headers: ["Challan / Inv #", "Candidate Full Name", "Grade & Wing", "Payee / Parent", "Payment Method", "Amount Settled (₹)", "Receipt Date", "Status"],
    rows: [
      { c1: "INV-ADM-0184", c2: "Advik Agarwal", sub: "Class 1 - Nursery", c3: "Pre-Primary Wing", c4: "Sanjay Agarwal", c5: "Razorpay UPI (Axis Bank)", c6: "₹24,500", c7: "28 Oct 2024", badge: "badge-active", status: "Settled" },
      { c1: "INV-ADM-0183", c2: "Saanvi Reddy", sub: "Class 6 - Middle", c3: "Middle Wing", c4: "Dr. K. S. Reddy", c5: "Net Banking (HDFC)", c6: "₹26,800", c7: "27 Oct 2024", badge: "badge-active", status: "Settled" },
      { c1: "INV-ADM-0182", c2: "Reyansh Joshi", sub: "Class 11 - Science (PCM)", c3: "Senior Secondary", c4: "Mahesh Joshi", c5: "Provisional Challan Pending", c6: "₹29,500 (Due)", c7: "Pending (Exp Today)", badge: "badge-pending", status: "Pending Due" },
      { c1: "INV-ADM-0181", c2: "Prisha Nair", sub: "Class 11 - Commerce", c3: "Senior Secondary", c4: "Gopalan Nair", c5: "Debit Card Swipe (POS)", c6: "₹28,200", c7: "25 Oct 2024", badge: "badge-active", status: "Settled" },
      { c1: "INV-ADM-0180", c2: "Arya Deshmukh", sub: "Class 9 - Secondary", c3: "Secondary Wing", c4: "Sunil Deshmukh", c5: "NEFT Bank Transfer", c6: "₹26,000", c7: "25 Oct 2024", badge: "badge-active", status: "Settled" },
      { c1: "INV-ADM-0179", c2: "Kabir Mehta", sub: "Class 3 - Primary", c3: "Primary Wing", c4: "Rakesh Mehta", c5: "Razorpay QR Payment", c6: "₹25,100", c7: "24 Oct 2024", badge: "badge-active", status: "Settled" },
      { c1: "INV-ADM-0178", c2: "Zara Khan", sub: "Class 11 - Humanities", c3: "Senior Secondary", c4: "Tariq Khan", c5: "Net Banking (ICICI)", c6: "₹27,500", c7: "23 Oct 2024", badge: "badge-active", status: "Settled" },
      { c1: "INV-ADM-0177", c2: "Ayaan Sen", sub: "Class 1 - Prep", c3: "Pre-Primary Wing", c4: "Debashis Sen", c5: "Razorpay Card Checkout", c6: "₹24,500", c7: "22 Oct 2024", badge: "badge-active", status: "Settled" }
    ]
  },

  // 15. admission-reports.php
  'admission-reports.php': {
    title: 'Admission Reports',
    icon: 'bi-bar-chart-line-fill',
    isReportPage: true,
    desc: 'Statutory board intake summaries, demographic statistics, revenue audits, and conversion analytics',
    kpi1: { title: "Standard Reports", val: "14 Formats", trend: "CBSE & SMC Standard", icon: "bi-file-earmark-bar-graph-fill", color: "kpi-primary" },
    kpi2: { title: "Board LOC Ready", val: "100% Synced", trend: "OASIS & UDISE+ Format", icon: "bi-shield-check", color: "kpi-success" },
    kpi3: { title: "Gender Balance Ratio", val: "52 : 48", trend: "Balanced Boys vs Girls", icon: "bi-gender-ambiguous", color: "kpi-info" },
    kpi4: { title: "Export Capabilities", val: "PDF & CSV", trend: "Instant Data Download", icon: "bi-download", color: "kpi-warning" },
    filterPlaceholder: "Search report code, title, frequency...",
    filterOptions: ["All Reporting Categories", "Intake & Capacity Utilisation", "Fee Collection & Outstanding Audit", "Board Registration & Statutory", "Marketing Channel Performance"],
    filterOptionName: "Report Domain",
    statusFilterOptions: ["All Status", "Generated & Current", "Scheduled Weekly", "Monthly Reconciled", "Annual Archive"],
    headers: ["Report Code", "Report Title & Description", "Reporting Scope", "Data Granularity", "Generated By", "Records Covered", "Last Generated", "Status"],
    rows: [
      { c1: "REP-ADM-001", c2: "Annual Intake & Seat Capacity Audit", sub: "Wing-wise target vs actual admissions", c3: "Institutional All Wings", c4: "Session 2025-26", c5: "Dean Admissions", c6: "1,248 Records", c7: "Today (08:00 AM)", badge: "badge-active", status: "Live Synced" },
      { c1: "REP-ADM-002", c2: "CBSE Statutory Registration Roll (LOC)", sub: "OASIS and UDISE+ student manifest", c3: "Classes 9 & 11 Batches", c4: "Statutory CBSE", c5: "Registrar Office", c6: "184 Enrolled", c7: "28 Oct 2024", badge: "badge-active", status: "Verified" },
      { c1: "REP-ADM-003", c2: "Admission Fee Collection Reconciliation", sub: "Breakup of admission, tuition & caution", c3: "Finance & Accounts", c4: "Financial Audit", c5: "Chief Accountant", c6: "₹46.20 Lakhs", c7: "28 Oct 2024", badge: "badge-active", status: "Reconciled" },
      { c1: "REP-ADM-004", c2: "Marketing Channel Attribution & ROI", sub: "Cost per lead & conversion by channel", c3: "Digital Marketing", c4: "Channel Yield", c5: "Media Lead", c6: "8 Sources", c7: "27 Oct 2024", badge: "badge-active", status: "Generated" },
      { c1: "REP-ADM-005", c2: "Parent Demographic & Geographic Analysis", sub: "Pin-code & transport route feasibility", c3: "Transport & Planning", c4: "GIS Mapping", c5: "Transport Supervisor", c6: "842 Applicants", c7: "26 Oct 2024", badge: "badge-active", status: "Generated" },
      { c1: "REP-ADM-006", c2: "Gender Parity & Social Quota Statement", sub: "Boys/Girls and EWS/DG quota compliance", c3: "Compliance Desk", c4: "RTE & Equal Opportunity", c5: "HR & Legal", c6: "184 Students", c7: "25 Oct 2024", badge: "badge-active", status: "Verified" },
      { c1: "REP-ADM-007", c2: "Sibling & Alumni Discount Ledger", sub: "Concession impact on gross fee pool", c3: "Finance Desk", c4: "Discount Audit", c5: "Chief Accountant", c6: "28 Concessions", c7: "24 Oct 2024", badge: "badge-active", status: "Reconciled" },
      { c1: "REP-ADM-008", c2: "Withdrawal & Cancellation Trend Analysis", sub: "Historical churn rates and reasons", c3: "Senior Management", c4: "Multi-Year Trend", c5: "Principal Office", c6: "12 Cases", c7: "23 Oct 2024", badge: "badge-active", status: "Generated" }
    ]
  },

  // 16. re-admissions.php
  're-admissions.php': {
    title: 'Re-admissions',
    icon: 'bi-arrow-repeat',
    actionBtnText: 'Process Re-Admission',
    actionBtnIcon: 'bi-arrow-repeat',
    desc: 'Student reinstatement requests, academic gap year approvals, and returning scholar registrations',
    kpi1: { title: "Re-admission Files", val: "18 Cases", trend: "Returning Students", icon: "bi-arrow-repeat", color: "kpi-primary" },
    kpi2: { title: "Approved & Rejoined", val: "14 Scholars", trend: "Academic Clearances Done", icon: "bi-person-check-fill", color: "kpi-success" },
    kpi3: { title: "Gap Year Medical", val: "3 Cases", trend: "Pediatric Clearances", icon: "bi-hospital", color: "kpi-info" },
    kpi4: { title: "Under Scrutiny", val: "4 Cases", trend: "Disciplinary / Fee Review", icon: "bi-hourglass-split", color: "kpi-warning" },
    filterPlaceholder: "Search case #, student name, former scholar ID...",
    filterOptions: ["All Reasons", "Medical Leave Gap", "Parent Foreign Relocation Return", "Academic Performance Recovery", "Financial Hardship Resumption"],
    filterOptionName: "Re-Admission Reason",
    statusFilterOptions: ["All Status", "Sanctioned & Re-enrolled", "Academic Scrutiny", "Fee Clearance Due", "Declined"],
    headers: ["Case File #", "Student Full Name", "Target Grade", "Former Scholar ID", "Reason for Gap", "Academic Clearance", "Sanction Date", "Status"],
    rows: [
      { c1: "READM-2025-018", c2: "Karan Johar", sub: "Returning Student", c3: "Class 10 - Secondary", c4: "SCH-2022-8412", c5: "Family Relocation from Dubai", c6: "Diagnostic Passed (84%)", c7: "28 Oct 2024", badge: "badge-active", status: "Re-enrolled" },
      { c1: "READM-2025-017", c2: "Ananya Saxena", sub: "Medical Gap Return", c3: "Class 7 - Middle", c4: "SCH-2021-4921", c5: "Medical Recovery (6 Month Gap)", c6: "Medical Fitness Verified", c7: "27 Oct 2024", badge: "badge-active", status: "Re-enrolled" },
      { c1: "READM-2025-016", c2: "Siddharth Rawat", sub: "Academic Recovery", c3: "Class 11 - Commerce", c4: "SCH-2023-9481", c5: "Repeat Year for Board Improvement", c6: "Principal Council Approved", c7: "26 Oct 2024", badge: "badge-pending", status: "Scrutiny" },
      { c1: "READM-2025-015", c2: "Pooja Hegde", sub: "Returning Student", c3: "Class 8 - Middle", c4: "SCH-2020-1048", c5: "Parent Deputation in Bengaluru", c6: "Interstate TC Verified", c7: "25 Oct 2024", badge: "badge-active", status: "Re-enrolled" },
      { c1: "READM-2025-014", c2: "Varun Dhawan", sub: "Sports Leave Gap", c3: "Class 12 - Commerce", c4: "SCH-2019-3920", c5: "National Tennis Tour Gap", c6: "Sports Quota Exemption", c7: "24 Oct 2024", badge: "badge-active", status: "Re-enrolled" },
      { c1: "READM-2025-013", c2: "Shraddha Kapoor", sub: "Health Leave", c3: "Class 5 - Primary", c4: "SCH-2022-1940", c5: "Prolonged Illness Recovery", c6: "Pediatric Clearance Cleared", c7: "23 Oct 2024", badge: "badge-active", status: "Re-enrolled" },
      { c1: "READM-2025-012", c2: "Aditya Roy Kapur", sub: "Returning Student", c3: "Class 9 - Secondary", c4: "SCH-2021-9482", c5: "Family Overseas Sabbatical", c6: "Assessment Completed", c7: "22 Oct 2024", badge: "badge-active", status: "Re-enrolled" },
      { c1: "READM-2025-011", c2: "Kriti Sanon", sub: "Fee Restructure", c3: "Class 11 - Science", c4: "SCH-2023-1049", c5: "Financial Hardship Resumption", c6: "Management Concession Cleared", c7: "21 Oct 2024", badge: "badge-pending", status: "Fee Clearance" }
    ]
  },

  // 17. withdrawal-requests.php
  'withdrawal-requests.php': {
    title: 'Withdrawal Requests',
    icon: 'bi-box-arrow-left',
    actionBtnText: 'Submit Withdrawal Form',
    actionBtnIcon: 'bi-file-earmark-x',
    desc: 'Transfer Certificate (TC) applications, security deposit refund clearances, and student exit protocols',
    kpi1: { title: "Withdrawal Requests", val: "12 Total", trend: "0.42% Low Annual Churn", icon: "bi-box-arrow-right", color: "kpi-primary" },
    kpi2: { title: "TC Dispatched", val: "9 Issued", trend: "Counter-Signed by Education Dept", icon: "bi-file-earmark-check-fill", color: "kpi-success" },
    kpi3: { title: "Security Refunded", val: "₹1,80,000", trend: "Caution Money Cleared", icon: "bi-wallet2", color: "kpi-info" },
    kpi4: { title: "Pending No Dues", val: "3 Cases", trend: "Library & Lab Clearance Due", icon: "bi-clock-history", color: "kpi-warning" },
    filterPlaceholder: "Search TC application #, student, reason for exit...",
    filterOptions: ["All Exit Reasons", "Parent Transfer / Relocation", "Boarding / Residential Shift", "Board Switch (CBSE to IB)", "Distance / Commute Issues"],
    filterOptionName: "Withdrawal Reason",
    statusFilterOptions: ["All Status", "TC Issued & Dispatched", "No-Dues In Progress", "Caution Refund Processed", "Pending Library Clearance"],
    headers: ["TC Request #", "Student Full Name", "Class & Section", "Parent / Guardian", "Exit Reason", "No Dues Status", "Caution Refund (₹)", "Status"],
    rows: [
      { c1: "WDL-2025-0012", c2: "Tushar Sengupta", sub: "Scholar: SCH-2021-8412", c3: "Class 8 - Section B", c4: "Subhash Sengupta", c5: "Parent Transfer to London, UK", c6: "All Clear (Library/Lab/Fee)", c7: "₹15,000 (Refunded)", badge: "badge-active", status: "TC Issued" },
      { c1: "WDL-2025-0011", c2: "Ananya Dixit", sub: "Scholar: SCH-2022-4912", c3: "Class 5 - Section A", c4: "Dr. Alok Dixit", c5: "Relocation to Bengaluru (IT Shift)", c6: "All Clear (Library/Lab/Fee)", c7: "₹15,000 (Refunded)", badge: "badge-active", status: "TC Issued" },
      { c1: "WDL-2025-0010", c2: "Devendra Rathore", sub: "Scholar: SCH-2020-1049", c3: "Class 10 - Section C", c4: "Col. V. S. Rathore", c5: "Father Transferred to Pune Army HQ", c6: "Pending Chemistry Lab Dues", c7: "₹15,000 (On Hold)", badge: "badge-pending", status: "No Dues Pending" },
      { c1: "WDL-2025-0009", c2: "Simran Kaur", sub: "Scholar: SCH-2023-9481", c3: "Class 3 - Section A", c4: "Gurpreet Singh", c5: "Shifted to Day-Boarding School", c6: "All Clear (Library/Lab/Fee)", c7: "₹15,000 (Refunded)", badge: "badge-active", status: "TC Issued" },
      { c1: "WDL-2025-0008", c2: "Aakash Chopra", sub: "Scholar: SCH-2019-3920", c3: "Class 11 - Commerce", c4: "Sunil Chopra", c5: "Moving to Kota for Competitive Prep", c6: "All Clear (Library/Lab/Fee)", c7: "₹20,000 (Refunded)", badge: "badge-active", status: "TC Issued" },
      { c1: "WDL-2025-0007", c2: "Megha Singhal", sub: "Scholar: SCH-2022-1940", c3: "Class 6 - Section B", c4: "Praveen Singhal", c5: "Distance / Commute Challenges", c6: "Pending 1 Library Book", c7: "₹15,000 (On Hold)", badge: "badge-pending", status: "Library Due" },
      { c1: "WDL-2025-0006", c2: "Aryan Oberoi", sub: "Scholar: SCH-2021-9482", c3: "Class 9 - Section A", c4: "Rakesh Oberoi", c5: "Switching to International IB Board", c6: "All Clear (Library/Lab/Fee)", c7: "₹15,000 (Refunded)", badge: "badge-active", status: "TC Issued" },
      { c1: "WDL-2025-0005", c2: "Nandini Gupta", sub: "Scholar: SCH-2023-1049", c3: "Class 2 - Section B", c4: "Sanjay Gupta", c5: "Relocation to Singapore", c6: "All Clear (Library/Lab/Fee)", c7: "₹15,000 (Refunded)", badge: "badge-active", status: "TC Issued" }
    ]
  }
};

// Generate each file
let count = 0;
for (const [filename, d] of Object.entries(submodulesData)) {
  const filePath = path.join(ADMISSIONS_DIR, filename);

  const isReports = d.isReportPage === true;
  const headerActionHtml = isReports ? `
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', '${filename.replace('.php', '')}_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" onclick="EduTables.print()">
      <i class="bi bi-file-earmark-pdf me-1"></i> Print / Save PDF
    </button>` : `
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', '${filename.replace('.php', '')}_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi ${d.actionBtnIcon || 'bi-plus-lg'} me-1"></i> ${d.actionBtnText || 'Add New Record'}
    </button>`;

  const rowActionHtml = isReports ? `
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Summary"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-primary" onclick="EduTables.exportCSV('#mainDataTable', '${filename.replace('.php', '')}_download.csv')" title="Download Report"><i class="bi bi-download"></i></button>
          </div>` : `
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, '${d.title.replace(/'/g, "\\'")}')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>`;

  const content = `<?php
/**
 * EDUSYS PRO - ${d.title.toUpperCase()}
 * Dedicated operational interface & records management for ${d.title}
 */
$page_title = "${d.title}";
$page_desc = "${d.desc}";
$active_module = "admissions";
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
      <li class="breadcrumb-item"><a href="<?php echo base_url('modules/admissions/dashboard.php'); ?>">Admission Management</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($page_title); ?></li>
    </ol>
  </nav>
</div>

<!-- Page Header Box -->
<div class="page-header-box mb-4">
  <div class="page-title-group">
    <h1><i class="bi ${d.icon} text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">${headerActionHtml}
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
        <td class="text-center">${rowActionHtml}
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
  console.log(`[GENERATED] admissions/${filename} (${d.title})`);
}

console.log(`Successfully generated ${count} customized admissions submodules.`);
