<script type="text/javascript">
        var gk_isXlsx = false;
        var gk_xlsxFileLookup = {};
        var gk_fileData = {};
        function filledCell(cell) {
          return cell !== '' && cell != null;
        }
        function loadFileData(filename) {
        if (gk_isXlsx && gk_xlsxFileLookup[filename]) {
            try {
                var workbook = XLSX.read(gk_fileData[filename], { type: 'base64' });
                var firstSheetName = workbook.SheetNames[0];
                var worksheet = workbook.Sheets[firstSheetName];

                // Convert sheet to JSON to filter blank rows
                var jsonData = XLSX.utils.sheet_to_json(worksheet, { header: 1, blankrows: false, defval: '' });
                // Filter out blank rows (rows where all cells are empty, null, or undefined)
                var filteredData = jsonData.filter(row => row.some(filledCell));

                // Heuristic to find the header row by ignoring rows with fewer filled cells than the next row
                var headerRowIndex = filteredData.findIndex((row, index) =>
                  row.filter(filledCell).length >= filteredData[index + 1]?.filter(filledCell).length
                );
                // Fallback
                if (headerRowIndex === -1 || headerRowIndex > 25) {
                  headerRowIndex = 0;
                }

                // Convert filtered JSON back to CSV
                var csv = XLSX.utils.aoa_to_sheet(filteredData.slice(headerRowIndex)); // Create a new sheet from filtered array of arrays
                csv = XLSX.utils.sheet_to_csv(csv, { header: 1 });
                return csv;
            } catch (e) {
                console.error(e);
                return "";
            }
        }
        return gk_fileData[filename] || "";
        }
        </script><!DOCTYPE html>
<body>
  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expansion Joint Specification Form</title>
<style>
    body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
    .section { margin-bottom: 20px; }
    .section-title {
        font-weight: bold;
        font-size: 14px;
        margin-bottom: 10px;
        border-bottom: 2px solid #000;
        padding-bottom: 4px;
    }
    .form-row {
        display: flex;
        gap: 20px;
        margin-bottom: 10px;
    }
    .form-group {
        flex: 1;
    }
    label {
        font-weight: bold;
        margin-bottom: 2px;
        display: block;
    }
    .value {
        border-bottom: 1px solid #ccc;
        padding: 2px 0;
    }
</style>
</head>
<body>

    <h1>EXPANSION JOINT SPECIFICATION FORM</h1>
    
    <div class="section">
        <div class="section-title">Company Information</div>
        <div class="form-row">
            <div class="form-group">
                <label>Your Name:</label>
                <div class="value">{{ $data->fullname ?? 'N/A' }}</div>
            </div>
            <div class="form-group">
                <label>Company Name:</label>
                <div class="value">{{ $data->company_name ?? 'N/A' }}</div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label>Address:</label>
                <div class="value">{{ $data->address ?? 'N/A' }}</div>
            </div>
            <div class="form-group">
                <label>Country:</label>
                <div class="value">{{ $data->country ?? 'N/A' }}</div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label>Contact Number:</label>
                <div class="value">{{ $data->contact ?? 'N/A' }}</div>
            </div>
            <div class="form-group">
                <label>Fax Number:</label>
                <div class="value">{{ $data->fax_number ?? 'N/A' }}</div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label>Email:</label>
                <div class="value">{{ $data->email ?? 'N/A' }}</div>
            </div>
            <div class="form-group">
                <label>Web Address:</label>
                <div class="value">{{ $data->web_address ?? 'N/A' }}</div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Expansion Joint Selection</div>
        <div class="form-row">
            <div class="form-group">
                <label>Joint Type:</label>
                <div class="value">{{ $data->joint_type ?? 'N/A' }}</div>
            </div>
            <div class="form-group">
                <label>Product:</label>
                <div class="value">{{ $data->product ?? 'N/A' }}</div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label>Nominal Diameter:</label>
                <div class="value">{{ $data->nominal_diameter ?? 'N/A' }}</div>
            </div>
            <div class="form-group">
                <label>Article Number:</label>
                <div class="value">{{ $data->article_number ?? 'N/A' }}</div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label>Length:</label>
                <div class="value">{{ $data->length ?? 'N/A' }}</div>
            </div>
            <div class="form-group">
                <label>Quantity:</label>
                <div class="value">{{ $data->quantity ?? 'N/A' }}</div>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="section-title">Expansion Joint Specifications</div>
        <div class="form-row">
            <div class="form-group">
                <label>Inner Sleeve:</label>
                <div class="value">{{ $data->inner_sleeve ?? 'N/A' }}</div>
            </div>
            <div class="form-group">
                <label>Cover:</label>
                <div class="value">{{ $data->cover ?? 'N/A' }}</div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label>100% Pickling:</label>
                <div class="value">{{ $data->pickling ?? 'N/A' }}</div>
            </div>
            <div class="form-group">
                <label>Marking:</label>
                <div class="value">{{ $data->marking ?? 'N/A' }}</div>
            </div>
            <div class="form-group">
                <label>Please specify:</label>
                <div class="value">{{ $data->marking_specify ?? 'N/A' }}</div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label>AISI:</label>
                <div class="value">{{ $data->aisi ?? 'N/A' }}</div>
            </div>
            <div class="form-group">
                <label>Other:</label>
                <div class="value">{{ $data->aisi_other ?? 'N/A' }}</div>
            </div>
            <div class="form-group">
                <label>Material certificate requested:</label>
                <div class="value">{{ $data->materialCertBellow ?? 'N/A' }}</div>
            </div>
            <div class="form-group">
                <label>Design parameters in acc. with EJMA 9.2:</label>
                <div class="value">{{ $data->design_params ?? 'N/A' }}</div>
            </div>
            <div class="form-group">
                <label>PED APPROVAL:</label>
                <div class="value">{{ $data->ped_approval ?? 'N/A' }}</div>
            </div>
        </div>
    </div>

</body>
</html>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script>    
    function generatePDF() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();
    
    let y = 20;
    const leftMargin = 20;
    const rightMargin = 200;
    const pageWidth = 210;
    const pageHeight = 297;
    
    // Helper function to add section headers
    function addSectionHeader(text, yPos) {
        if (yPos > pageHeight - 30) {
            doc.addPage();
            yPos = 20;
        }
        doc.setFontSize(12);
        doc.setFont(undefined, 'bold');
        doc.text(text, leftMargin, yPos);
        doc.setLineWidth(0.5);
        doc.line(leftMargin, yPos + 2, pageWidth - 20, yPos + 2);
        return yPos + 12;
    }
    
    // Helper function to add field in two-column layout
    function addField(label, value, yPos, isLeft = true) {
        if (yPos > pageHeight - 20) {
            doc.addPage();
            yPos = 20;
        }
        
        doc.setFontSize(9);
        doc.setFont(undefined, 'normal');
        
        const xPos = isLeft ? leftMargin : (pageWidth / 2) + 10;
        const labelWidth = isLeft ? 80 : 80;
        
        // Label
        doc.setFont(undefined, 'bold');
        doc.text(label + ':', xPos, yPos);
        
        // Value
        doc.setFont(undefined, 'normal');
        const valueText = value || '';
        doc.text(valueText, xPos + labelWidth, yPos);
        
        return isLeft ? yPos : yPos + 6;
    }
    
    // Helper function to add single full-width field
    function addFullWidthField(label, value, yPos) {
        if (yPos > pageHeight - 20) {
            doc.addPage();
            yPos = 20;
        }
        
        doc.setFontSize(9);
        doc.setFont(undefined, 'bold');
        doc.text(label + ':', leftMargin, yPos);
        
        doc.setFont(undefined, 'normal');
        const valueText = value || '';
        doc.text(valueText, leftMargin + 80, yPos);
        
        return yPos + 6;
    }
    
    // Title
    doc.setFontSize(16);
    doc.setFont(undefined, 'bold');
    doc.text('EXPANSION JOINT SPECIFICATION FORM', leftMargin, y);
    y += 20;
    
    // Company Information Section
    y = addSectionHeader('COMPANY INFORMATION', y);
    
    y = addField('Your Name', document.getElementById('yourName').value, y, true);
    y = addField('Company Name', document.getElementById('companyName').value, y, false);
    
    y = addField('Address', document.getElementById('address').value, y, true);
    y = addField('Country', document.getElementById('country').value, y, false);
    
    y = addField('Contact Number', document.getElementById('contactNumber').value, y, true);
    y = addField('Fax Number', document.getElementById('faxNumber').value, y, false);
    
    y = addField('Email Address', document.getElementById('emailAddress').value, y, true);
    y = addField('Web Address', document.getElementById('web').value, y, false);
    
    y += 10;
    
    // Expansion Joint Selection Section
    y = addSectionHeader('EXPANSION JOINT SELECTION', y);
    
    y = addField('Type of Expansion Joint', document.getElementById('jointType').value, y, true);
    y = addField('Product', document.getElementById('product').value, y, false);
    
    y = addField('Nominal Diameter (DN)', document.getElementById('nominalDiameter').value, y, true);
    y = addField('Article No', document.getElementById('articleNo').value, y, false);
    
    y = addField('Length', document.getElementById('length').value + ' mm', y, true);
    y = addField('Quantity', document.getElementById('quantity').value, y, false);
    
    y += 10;
    
    // Expansion Joint Specifications Section
    y = addSectionHeader('EXPANSION JOINT SPECIFICATIONS', y);
    
    y = addField('Inner Sleeve', document.querySelector('input[name="innerSleeve"]:checked')?.value || 'No', y, true);
    y = addField('Cover', document.querySelector('input[name="cover"]:checked')?.value || 'No', y, false);
    
    y = addField('100% Pickling', document.querySelector('input[name="pickling"]:checked')?.value || 'No', y, true);
    y = addField('Marking', document.querySelector('input[name="marking"]:checked')?.value || 'No', y, false);
    
    y = addFullWidthField('Specification Details', document.getElementById('specify1').value, y);
    y += 5;
    
    // Bellow Subsection
    doc.setFontSize(10);
    doc.setFont(undefined, 'bold');
    doc.text('BELLOW', leftMargin, y);
    y += 8;
    
    y = addField('AISI Grade', document.getElementById('aisi').value, y, true);
    y = addField('Other Material', document.getElementById('otherBellow').value, y, false);
    
    y = addField('Material Certificate', document.querySelector('input[name="materialCertBellow"]:checked')?.value || 'No', y, true);
    y = addField('EJMA 9.2 Design', document.querySelector('input[name="designParams"]:checked')?.value || 'No', y, false);
    
    y = addFullWidthField('PED Approval', document.querySelector('input[name="pedApproval"]:checked')?.value || 'No', y);
    y += 5;
    
    // Connection Details Subsection
    doc.setFontSize(10);
    doc.setFont(undefined, 'bold');
    doc.text('CONNECTION DETAILS', leftMargin, y);
    y += 8;
    
    const conn1 = document.getElementById('connection1').value + ' (' + document.getElementById('connection1Detail').value + ')';
    const conn2 = document.getElementById('connection2').value + ' (' + document.getElementById('connection2Detail').value + ')';
    
    y = addField('Connection 1', conn1, y, true);
    y = addField('Connection 2', conn2, y, false);
    
    y = addField('Material', document.getElementById('materialConnections').value, y, true);
    y = addField('Material Certificate', document.querySelector('input[name="materialCertConnections"]:checked')?.value || 'No', y, false);
    
    y = addField('Coating', document.getElementById('coatingConnections').value, y, true);
    y = addField('Other', document.getElementById('otherConnections').value, y, false);
    
    y += 10;
    
    // Operating Conditions Section
    y = addSectionHeader('OPERATING CONDITIONS', y);
    
    y = addField('Working Pressure Min', document.getElementById('workingPressureMin').value + ' Bar', y, true);
    y = addField('Working Pressure Max', document.getElementById('workingPressureMax').value + ' Bar', y, false);
    
    y = addField('Design Pressure Min', document.getElementById('designPressureMin').value + ' Bar', y, true);
    y = addField('Design Pressure Max', document.getElementById('designPressureMax').value + ' Bar', y, false);
    
    y = addField('Working Temp Min', document.getElementById('workingTempMin').value + ' °C', y, true);
    y = addField('Working Temp Max', document.getElementById('workingTempMax').value + ' °C', y, false);
    
    y = addField('Design Temp Min', document.getElementById('designTempMin').value + ' °C', y, true);
    y = addField('Design Temp Max', document.getElementById('designTempMax').value + ' °C', y, false);
    
    y = addFullWidthField('Application/Medium', document.getElementById('applicationMedium').value, y);
    y += 10;
    
    // Movement Section
    y = addSectionHeader('MOVEMENT', y);
    
    y = addField('Axial Movement', document.getElementById('axialMovement').value + ' mm', y, true);
    y = addField('Lateral Movement', document.getElementById('lateralMovement').value + ' mm', y, false);
    
    y = addField('Angular Movement', document.getElementById('angularMovement').value + ' mm', y, true);
    y = addField('Cycle Life', document.getElementById('cycleLife').value + ' times', y, false);
    
    y += 10;
    
    // Quality Measures Section
    y = addSectionHeader('QUALITY MEASURES', y);
    
    y = addField('Liquid Dye Penetrant', document.querySelector('input[name="liquidDye"]:checked')?.value || 'No', y, true);
    y = addField('X-ray', document.querySelector('input[name="xray"]:checked')?.value || 'No', y, false);
    
    y = addField('Helium Leakage Test', document.querySelector('input[name="heliumLeakage"]:checked')?.value || 'No', y, true);
    y = addField('Air Leakage Test', document.querySelector('input[name="airLeakage"]:checked')?.value || 'No', y, false);
    
    y = addField('Hydrostatic Test', document.querySelector('input[name="hydrostatic"]:checked')?.value || 'No', y, true);
    y = addField('Other Quality', document.querySelector('input[name="otherQuality"]:checked')?.value || 'No', y, false);
    
    y = addFullWidthField('Quality Specifications', document.getElementById('specifyQuality').value, y);
    y += 10;
    
    // Documentation Section
    y = addSectionHeader('DOCUMENTATION', y);
    
    y = addField('PPAP', document.querySelector('input[name="ppap"]:checked')?.value || 'No', y, true);
    y = addField('NDT Report', document.querySelector('input[name="ndtReport"]:checked')?.value || 'No', y, false);
    
    y = addField('Other Documentation', document.querySelector('input[name="otherDoc"]:checked')?.value || 'No', y, true);
    y = addField('2D Measurement', document.querySelector('input[name="dimension2D"]:checked')?.value || 'No', y, false);
    
    y = addField('3D Measurement', document.querySelector('input[name="dimension3D"]:checked')?.value || 'No', y, true);
    
    y = addFullWidthField('Documentation Details', document.getElementById('specifyDoc').value, y);
    y += 10;
    
    // Special Requirements Section
    y = addSectionHeader('SPECIAL REQUIREMENTS', y);
    y = addFullWidthField('Special Requirements', document.getElementById('specialRequirements').value, y);
    
    // Footer
    y += 20;
    if (y > pageHeight - 30) {
        doc.addPage();
        y = 20;
    }
    
    doc.setFontSize(8);
    doc.setFont(undefined, 'italic');
    doc.text('Generated on: ' + new Date().toLocaleDateString(), leftMargin, y);
    doc.text('Page ' + doc.internal.getNumberOfPages(), pageWidth - 40, y);
    
    // Save the PDF
    doc.save('Expansion_Joint_Specification_Form.pdf');
    }
    window.onload = function() {
      generatePDF();
    };
</script>
</body>
</html>