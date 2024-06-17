<?php
include 'db_connect.php';

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=Employee_list.csv');

$output = fopen('php://output', 'w');
fputcsv($output, array('ID', 'Staff ID', 'FullName(Khmer)', 'FullName(English)', 'Gender', 'Position', 'Section', 'Department',
 'Job Grade', 'Corporate Rank', 'Job Grade Level', 'Starting Date', 'Seniority at CAIC', 'Work Location', 'Date of Birth', 'Probation Period', 'Converted From'
 , 'Place of Birth(Khmer)', 'Place of Birth(English)', 'Nationality', 'Cambodia NID No.', 'Passport No.', 'CNB Bank Account', 'Current Address(Khmer)', 'Current Address(English)', 'Personal Contact(Line1)'
 , 'Personal Contact(Line2)', 'Telegram Contact', 'Personal Email', 'Professional Email(Bank)', 'Highest Academic Degree', 'Major(English)', 'University/Institute', 'Education', 'NSSF ID Card No.'
 , 'Vaccination Card No.', 'Emergency Contact Person(Name in Khmer)', 'Emergency Contact Person(Name in English)', 'Emergency Contact(Line1)', 'Emergency Contact(Line2)', 'Relationship', 'Emergency Contact Person(Current Address)', 'Marital Status', 'Spouse FullName(Khmer)'
 , 'Spouse FullName(English)', 'Date of Birth(Spouse)', 'Nationality', 'Spouse Occupation', 'Spouse Contact No.(Line1)', 'Spouse Contact No.(Line2)-Optional', 'No. of Children', '1st Children FullName(Khmer)', '1st Children FullName(English)', '1st Child Date of Birth', '1st Children Occupation',
 '2nd Children FullName(Khmer)', '2nd Children FullName(English)', '2nd Child Date of Birth', '2nd Children Occupation','3rd Children FullName(Khmer)', '3rd Children FullName(English)', '3rd Child Date of Birth', '3rd Children Occupation','4th Children FullName(Khmer)', '4th Children FullName(English)', '4th Child Date of Birth', '4th Children Occupation'
 ,'5th Children FullName(Khmer)', '5th Children FullName(English)', '5th Child Date of Birth', '5th Children Occupation', 'Performance Bonus(for the years)', 'Band(for the years)', 'Modification(for the years)', 'Remark(for each year)', 'Contract Type', 'Contract Due Date(If FDC)', 'Career Movement within CAIC', 'Disciplinary Record', 'Probationary Period(in month)'
 , 'Confirm Pro. Date', 'Latest Starting Date at Group', 'Latest Seniority from Group', 'Suspension Period'));

$qry = $conn->query("SELECT
    e.staff_id,
    e.employment_status,
    e.fkhmer,
    e.fenglish,
    e.gender,
    e.position,
    e.department,
    e.section,
    e.job_grade,
    e.corporate_rank,
    e.job_grade_level,
    e.starting_date,
    e.seniority,
    e.dob,
    e.pro_period,
    e.converted_from,
    
    p.pob_khmer,
    p.pob_english,
    p.nationality,
    p.cnn,
    p.passport,
    p.cnb,
    p.ca_khmer,
    p.ca_english,
    p.pc_line1,
    p.pc_line2,
    p.tel_con,
    p.pemail,
    p.pemail_bank,
    
    edu.had,
    edu.major,
    edu.uni_ins,
    edu.edu,
    
    h.nssf,
    h.vcard,
    
    emg.ecp_khmer,
    emg.ecp_english,
    emg.ec_line1,
    emg.ec_line2,
    emg.relationship,
    emg.ecp_ca,
    
    f.sp_khmer,
    f.sp_english,
    f.dob_spouse,
    f.sp_nation,
    f.soccup,
    f.spc_line1,
    f.spc_line2,
    f.noc,
    f.cfull_khmer1,
    f.cfull_english1,
    f.dob_c1,
    f.coccup1,
    f.cfull_khmer2,
    f.cfull_english2,
    f.dob_c2,
    f.coccup2,
    f.cfull_khmer3,
    f.cfull_english3,
    f.dob_c3,
    f.coccup3,
    f.cfull_khmer4,
    f.cfull_english4,
    f.dob_c4,
    f.coccup4,
    f.cfull_khmer5,
    f.cfull_english5,
    f.dob_c5,
    f.coccup5,
    
    pf.pbonus,
    pf.band,
    pf.modifi,
    pf.remark,
    pf.contract_type,
    pf.cd_date,
    pf.cmovement,
    pf.drecord,
    pf.pp_month,
    pf.cpro_date,
    pf.lstarting_date,
    pf.lseniority,
    pf.s_period,
    pf.working_day,
    pf.ror
FROM
    employee_list e
LEFT JOIN
    personal p ON e.staff_id = p.staff_id
LEFT JOIN
    edu edu ON e.staff_id = edu.staff_id
LEFT JOIN
    health h ON e.staff_id = h.staff_id
LEFT JOIN
    emergencys emg ON e.staff_id = emg.staff_id
LEFT JOIN
    family f ON e.staff_id = f.staff_id
LEFT JOIN
    perfor pf ON e.staff_id = pf.staff_id
ORDER BY
    e.staff_id;");
if($qry->num_rows > 0){
    while($row = $qry->fetch_assoc()){
        fputcsv($output, $row);
    }
}

fclose($output);
exit();
?>