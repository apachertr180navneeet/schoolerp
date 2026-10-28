/**
 * EDUSYS PRO - COMPREHENSIVE MOCK DATASET
 * Realistic Indian CBSE & State Board School Data
 */

window.EduMockData = (function () {
  const STORAGE_KEY = 'edusys_mock_data_v1';

  const defaultData = {
    school: {
      name: "Delhi Public Global Academy",
      shortName: "DPGA",
      tagline: "Excellence in Holistic Education & Innovation",
      affiliation: "CBSE & State Board Integrated (Affiliation No: 2130892, School Code: 70142)",
      address: "Sector 14, Knowledge City, New Delhi - 110075",
      phone: "+91 11 2893 4000",
      email: "info@dpglobalacademy.edu.in",
      website: "https://dpglobalacademy.edu.in",
      principal: "Dr. Sunita Rao, M.Sc., M.Ed., Ph.D.",
      currency: "INR",
      currencySymbol: "₹",
      currentSession: "2024-2025",
      board: "CBSE"
    },

    roles: [
      { id: "super_admin", name: "Super Admin", roleKey: "super_admin", email: "admin@edusys.com", defaultPath: "dashboards/admin.html", avatar: "SA" },
      { id: "school_admin", name: "School Administrator", roleKey: "school_admin", email: "schooladmin@edusys.com", defaultPath: "dashboards/admin.html", avatar: "AD" },
      { id: "principal", name: "Principal (Dr. Sunita Rao)", roleKey: "principal", email: "principal@edusys.com", defaultPath: "dashboards/principal.html", avatar: "PR" },
      { id: "accountant", name: "Accountant (M. K. Sharma)", roleKey: "accountant", email: "accounts@edusys.com", defaultPath: "dashboards/accountant.html", avatar: "AC" },
      { id: "admission_officer", name: "Admission Head (Rashmi Sen)", roleKey: "admission_officer", email: "admissions@edusys.com", defaultPath: "dashboards/admission-officer.html", avatar: "AO" },
      { id: "teacher", name: "PGT Teacher (Vikram Rathore)", roleKey: "teacher", email: "teacher@edusys.com", defaultPath: "dashboards/teacher.html", avatar: "TR" },
      { id: "class_teacher", name: "Class Teacher - 10A (Priya N.)", roleKey: "class_teacher", email: "classteacher@edusys.com", defaultPath: "dashboards/teacher.html", avatar: "CT" },
      { id: "librarian", name: "Chief Librarian (S. Nair)", roleKey: "librarian", email: "library@edusys.com", defaultPath: "dashboards/librarian.html", avatar: "LB" },
      { id: "transport_manager", name: "Transport Incharge (H. Singh)", roleKey: "transport_manager", email: "transport@edusys.com", defaultPath: "dashboards/transport-manager.html", avatar: "TM" },
      { id: "hr_manager", name: "HR Lead (Anjali Saxena)", roleKey: "hr_manager", email: "hr@edusys.com", defaultPath: "dashboards/hr-manager.html", avatar: "HR" },
      { id: "receptionist", name: "Front Desk (Kavita Joshi)", roleKey: "receptionist", email: "frontdesk@edusys.com", defaultPath: "modules/front-office/dashboard.html", avatar: "FD" },
      { id: "storekeeper", name: "Store Manager (R. P. Verma)", roleKey: "storekeeper", email: "store@edusys.com", defaultPath: "modules/inventory/dashboard.html", avatar: "SK" },
      { id: "security_guard", name: "Chief Warden / Security (Subedar Daljit)", roleKey: "security_guard", email: "security@edusys.com", defaultPath: "modules/security/dashboard.html", avatar: "SG" },
      { id: "student", name: "Student (Aarav Sharma - X-A)", roleKey: "student", email: "student@edusys.com", defaultPath: "dashboards/student.html", avatar: "AS" },
      { id: "parent", name: "Parent (Rajesh Sharma)", roleKey: "parent", email: "parent@edusys.com", defaultPath: "dashboards/parent.html", avatar: "RS" }
    ],

    classes: [
      { id: "c1", name: "Class 1", sectionCount: 3, streams: ["General"], students: 105 },
      { id: "c2", name: "Class 2", sectionCount: 3, streams: ["General"], students: 110 },
      { id: "c3", name: "Class 3", sectionCount: 4, streams: ["General"], students: 135 },
      { id: "c4", name: "Class 4", sectionCount: 4, streams: ["General"], students: 138 },
      { id: "c5", name: "Class 5", sectionCount: 4, streams: ["General"], students: 142 },
      { id: "c6", name: "Class 6", sectionCount: 4, streams: ["General"], students: 140 },
      { id: "c7", name: "Class 7", sectionCount: 4, streams: ["General"], students: 145 },
      { id: "c8", name: "Class 8", sectionCount: 4, streams: ["General"], students: 148 },
      { id: "c9", name: "Class 9", sectionCount: 5, streams: ["General"], students: 175 },
      { id: "c10", name: "Class 10", sectionCount: 5, streams: ["General"], students: 180 },
      { id: "c11", name: "Class 11", sectionCount: 6, streams: ["Science (PCM)", "Science (PCB)", "Commerce", "Humanities"], students: 195 },
      { id: "c12", name: "Class 12", sectionCount: 6, streams: ["Science (PCM)", "Science (PCB)", "Commerce", "Humanities"], students: 190 }
    ],

    sections: ["A", "B", "C", "D"],

    students: [
      { id: "STU-2024-001", admNo: "ADM-8491", name: "Aarav Sharma", class: "Class 10", section: "A", rollNo: 1, gender: "Male", dob: "2009-04-12", fatherName: "Rajesh Sharma", contact: "+91 98112 34567", route: "Route 4 (South Ext)", feeStatus: "Paid", attendance: 95.5, apaarId: "APAAR-8941-0294-1182", board: "CBSE" },
      { id: "STU-2024-002", admNo: "ADM-8492", name: "Diya Patel", class: "Class 10", section: "A", rollNo: 2, gender: "Female", dob: "2009-07-25", fatherName: "Bhavin Patel", contact: "+91 98223 45678", route: "Route 2 (Vasant Kunj)", feeStatus: "Paid", attendance: 97.2, apaarId: "APAAR-7712-9014-4421", board: "CBSE" },
      { id: "STU-2024-003", admNo: "ADM-8493", name: "Vihaan Singh", class: "Class 10", section: "B", rollNo: 1, gender: "Male", dob: "2009-02-18", fatherName: "Manpreet Singh", contact: "+91 98334 56789", route: "Route 1 (Dwarka)", feeStatus: "Partial", attendance: 88.0, apaarId: "APAAR-5510-1823-9934", board: "CBSE" },
      { id: "STU-2024-004", admNo: "ADM-8494", name: "Ananya Iyer", class: "Class 10", section: "B", rollNo: 2, gender: "Female", dob: "2009-11-05", fatherName: "R. Venkatesh Iyer", contact: "+91 98445 67890", route: "Route 5 (Janakpuri)", feeStatus: "Paid", attendance: 94.8, apaarId: "APAAR-6623-4412-8821", board: "CBSE" },
      { id: "STU-2024-005", admNo: "ADM-8495", name: "Rohan Gupta", class: "Class 12", section: "A", rollNo: 1, gender: "Male", dob: "2007-06-14", fatherName: "Sanjay Gupta", contact: "+91 98556 78901", route: "Route 3 (Rohini)", feeStatus: "Unpaid", attendance: 79.5, apaarId: "APAAR-3392-7712-0012", board: "CBSE" },
      { id: "STU-2024-006", admNo: "ADM-8496", name: "Ishaan Verma", class: "Class 12", section: "B", rollNo: 5, gender: "Male", dob: "2007-09-30", fatherName: "Dr. Alok Verma", contact: "+91 98667 89012", route: "Route 4 (South Ext)", feeStatus: "Paid", attendance: 96.0, apaarId: "APAAR-8834-5512-3341", board: "State Board" },
      { id: "STU-2024-007", admNo: "ADM-8497", name: "Meera Reddy", class: "Class 8", section: "A", rollNo: 12, gender: "Female", dob: "2011-03-22", fatherName: "K. S. Reddy", contact: "+91 98778 90123", route: "Route 1 (Dwarka)", feeStatus: "Paid", attendance: 98.4, apaarId: "APAAR-9941-2245-7761", board: "CBSE" },
      { id: "STU-2024-008", admNo: "ADM-8498", name: "Kabir Sengupta", class: "Class 9", section: "C", rollNo: 8, gender: "Male", dob: "2010-08-19", fatherName: "Debashis Sengupta", contact: "+91 98889 01234", route: "Route 6 (Noida Link)", feeStatus: "Paid", attendance: 92.1, apaarId: "APAAR-4412-9981-6652", board: "CBSE" }
    ],

    teachers: [
      { id: "EMP-101", name: "Dr. Sunita Rao", designation: "Principal", department: "Administration", qualification: "M.Sc. Physics, M.Ed., Ph.D.", experience: "22 Years", contact: "+91 98100 11223", email: "principal@edusys.com", status: "Active" },
      { id: "EMP-102", name: "Vikram Rathore", designation: "PGT Physics & HOD", department: "Science", qualification: "M.Sc., B.Ed.", experience: "14 Years", contact: "+91 98100 22334", email: "rathore.v@edusys.com", status: "Active" },
      { id: "EMP-103", name: "Priya Nambiar", designation: "TGT English & Class Teacher 10-A", department: "Languages", qualification: "M.A. English, B.Ed.", experience: "9 Years", contact: "+91 98100 33445", email: "nambiar.p@edusys.com", status: "Active" },
      { id: "EMP-104", name: "Rajesh Kulkarni", designation: "PGT Mathematics", department: "Mathematics", qualification: "M.Sc. Math, B.Ed.", experience: "16 Years", contact: "+91 98100 44556", email: "kulkarni.r@edusys.com", status: "Active" },
      { id: "EMP-105", name: "Dr. Shalini Kapoor", designation: "PGT Chemistry", department: "Science", qualification: "Ph.D. Chemistry", experience: "11 Years", contact: "+91 98100 55667", email: "kapoor.s@edusys.com", status: "Active" },
      { id: "EMP-106", name: "Amitabh Banerjee", designation: "PGT Computer Science & AI", department: "IT & CS", qualification: "M.Tech CSE", experience: "8 Years", contact: "+91 98100 66778", email: "banerjee.a@edusys.com", status: "Active" }
    ],

    feesSummary: {
      totalProjected: 48500000,
      collectedYTD: 42150000,
      pendingDues: 6350000,
      concessionsGiven: 1240000,
      recentTransactions: [
        { receiptNo: "REC-2024-9182", studentName: "Aarav Sharma", class: "Class 10-A", amount: 28500, mode: "Online (Razorpay)", date: "2024-10-27", status: "Success" },
        { receiptNo: "REC-2024-9181", studentName: "Diya Patel", class: "Class 10-A", amount: 28500, mode: "Net Banking", date: "2024-10-27", status: "Success" },
        { receiptNo: "REC-2024-9180", studentName: "Meera Reddy", class: "Class 8-A", amount: 24200, mode: "UPI", date: "2024-10-26", status: "Success" },
        { receiptNo: "REC-2024-9179", studentName: "Vihaan Singh", class: "Class 10-B", amount: 15000, mode: "Cheque (HDFC)", date: "2024-10-25", status: "Success" },
        { receiptNo: "REC-2024-9178", studentName: "Kabir Sengupta", class: "Class 9-C", amount: 26000, mode: "Cash Counter", date: "2024-10-25", status: "Success" }
      ]
    },

    admissionsFunnel: {
      totalEnquiries: 840,
      applicationsReceived: 495,
      underReview: 68,
      meritSelected: 320,
      feesPaidAdmitted: 284,
      seatsRemaining: 36
    },

    examinations: [
      { id: "EX-01", name: "Periodic Assessment 1 (PA-I)", session: "2024-2025", dateRange: "July 15 - July 24", status: "Completed", type: "Internal" },
      { id: "EX-02", name: "Term 1 / Half-Yearly Exam", session: "2024-2025", dateRange: "Sept 18 - Oct 03", status: "Results Declared", type: "Major Summative" },
      { id: "EX-03", name: "Periodic Assessment 2 (PA-II)", session: "2024-2025", dateRange: "Dec 02 - Dec 11", status: "Scheduled", type: "Internal" },
      { id: "EX-04", name: "CBSE Pre-Board Examination (X & XII)", session: "2024-2025", dateRange: "Jan 12 - Jan 25", status: "Planning", type: "Board Mock" },
      { id: "EX-05", name: "Annual Board Examination 2025", session: "2024-2025", dateRange: "Feb 15 - Mar 28", status: "Upcoming", type: "External Board" }
    ],

    transportFleet: [
      { busNo: "DL-1V-8901", busName: "Yellow Bus 01", driver: "Gurpreet Singh", phone: "+91 97110 44551", capacity: 45, studentsAssigned: 42, routeName: "Route 1 (Dwarka Sector 6 to 22)", gpsStatus: "Active", fuelLevel: "78%" },
      { busNo: "DL-1V-8902", busName: "Yellow Bus 02", driver: "Mohan Lal", phone: "+91 97110 44552", capacity: 45, studentsAssigned: 44, routeName: "Route 2 (Vasant Kunj & Mehrauli)", gpsStatus: "Active", fuelLevel: "65%" },
      { busNo: "DL-1V-8903", busName: "Yellow Bus 03", driver: "Ramesh Chand", phone: "+91 97110 44553", capacity: 45, studentsAssigned: 39, routeName: "Route 3 (Rohini & Pitampura)", gpsStatus: "Active", fuelLevel: "82%" },
      { busNo: "DL-1V-8904", busName: "Yellow Bus 04", driver: "Satnam Singh", phone: "+91 97110 44554", capacity: 45, studentsAssigned: 45, routeName: "Route 4 (South Ext & Lajpat Nagar)", gpsStatus: "Active", fuelLevel: "90%" }
    ],

    libraryStats: {
      totalTitles: 14850,
      totalCopies: 28400,
      issuedBooks: 1420,
      overdueReturns: 48,
      recentArrivals: [
        { isbn: "978-0199535569", title: "NCERT Exemplar Problems - Mathematics X", author: "NCERT Editorial", category: "Reference", shelf: "S-14" },
        { isbn: "978-9352834521", title: "Concepts of Physics (Vol 1 & 2)", author: "Dr. H. C. Verma", category: "Science", shelf: "P-02" },
        { isbn: "978-8177091878", title: "Wings of Fire", author: "Dr. A. P. J. Abdul Kalam", category: "Biography", shelf: "B-05" }
      ]
    },

    notices: [
      { id: "NOT-108", date: "2024-10-27", title: "CBSE LOC (List of Candidates) Verification for Class X & XII", category: "Academic / Board", target: "Class 10 & 12 Parents & Teachers", priority: "Urgent" },
      { id: "NOT-107", date: "2024-10-25", title: "Diwali & Chhath Puja Break Announcement", category: "Holiday", target: "All Students, Staff & Parents", priority: "Normal" },
      { id: "NOT-106", date: "2024-10-20", title: "Annual Inter-School Athletic Meet 'KHEL-FEST 2024'", category: "Sports", target: "Students Grade 6 to 12", priority: "High" },
      { id: "NOT-105", date: "2024-10-15", title: "Quarter 3 Fee Submission Deadline Notice", category: "Accounts", target: "All Parents", priority: "Important" }
    ]
  };

  function getData() {
    try {
      const stored = localStorage.getItem(STORAGE_KEY);
      if (stored) {
        return JSON.parse(stored);
      }
    } catch (e) {
      console.warn("Could not read from localStorage, using defaultData", e);
    }
    setData(defaultData);
    return defaultData;
  }

  function setData(data) {
    try {
      localStorage.setItem(STORAGE_KEY, JSON.stringify(data));
    } catch (e) {
      console.error("Could not write to localStorage", e);
    }
  }

  function resetToDefaults() {
    setData(defaultData);
    return defaultData;
  }

  return {
    get: getData,
    set: setData,
    reset: resetToDefaults,
    defaultData: defaultData
  };
})();
