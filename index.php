<?php
function displayCalendar($year, $filePath) {
    // Read the JSON file
    $jsonData = file_get_contents($filePath);
    $data = json_decode($jsonData, true);

    if (!$data) {
        echo "<p>Invalid data for $year/$filePath.</p>";
        return;
    }
    
    $metadata = $data['metadata'];
    $days = $data['days'];

    // Display the month and year
    //echo "<h2>" . $metadata['np'] . " (" . $metadata['en'] . ")</h2>";

    // Calendar headers
    $daysOfWeekNp = ['आइत', 'सोम', 'मंगल', 'बुध', 'बिही', 'शुक्र', 'शनि'];
    $daysOfWeekEn = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

    echo "<table>";
    echo "<tr>";
    for ($i = 0; $i < count($daysOfWeekNp); $i++) {
        echo "<th>{$daysOfWeekNp[$i]}<br>{$daysOfWeekEn[$i]}</th>";
    }
    echo "</tr>";

    // Display calendar days
    echo "<tr>";
    $currentDay = 0;

    foreach ($days as $day) {
        // Add empty cells for offset
        if ($currentDay == 0 && $day['d'] != 1) {
            for ($i = 1; $i < $day['d']; $i++) {
                echo "<td></td>";
                $currentDay++;
            }
        }

        // Display the day
        $class = $day['h'] ? "style='color:red; font-width: 400;'" : "";
        echo "<td $class>";
        echo $day['n'] ? "<span class='nep-day'>" . $day['n'] . "</span><br><span class='eng-day'>" . $day['e'] . "</span>" : "";
        echo "</td>";
        $currentDay++;

        // Start a new row after Saturday
        if ($currentDay == 7) {
            echo "</tr><tr>";
            $currentDay = 0;
        }
    }

    // Fill the last row with empty cells
    while ($currentDay > 0 && $currentDay < 7) {
        echo "<td></td>";
        $currentDay++;
    }

    echo "</tr>";
    echo "</table>";
}

function getYearFolders($baseDir) {
    $years = [];
    foreach (glob("$baseDir/*", GLOB_ONLYDIR) as $yearFolder) {
        $years[] = basename($yearFolder);
    }
    return $years;
}

function getNepaliMonths() {
    return [
        1 => 'बैशाख',
        2 => 'जेष्ठ',
        3 => 'आषाढ',
        4 => 'श्रावण',
        5 => 'भाद्र',
        6 => 'आश्विन',
        7 => 'कार्तिक',
        8 => 'मंसिर',
        9 => 'पुष',
        10 => 'माघ',
        11 => 'फाल्गुण',
        12 => 'चैत्र',
    ];
}

// Get the current Nepali date (use actual BS logic here if available)
$currentBSYear = 2080; // Replace this with a dynamic calculation for BS year
$currentBSMonth = 10; // Replace this with a dynamic calculation for BS month

// Base directory where all year folders are stored
$baseDir = 'data/'; // Change to your base directory path

// Handle the form submission or default to the current Nepali month/year
$selectedYear = isset($_POST['year']) ? $_POST['year'] : $currentBSYear;
$selectedMonth = isset($_POST['month']) ? $_POST['month'] : $currentBSMonth;
$filePath = "$baseDir/$selectedYear/$selectedMonth.json";

?>

<?php
// Read the JSON file
$jsonData = file_get_contents($filePath);
$data = json_decode($jsonData, true);
$metadata = $data['metadata'];



?>
<!DOCTYPE html>
<html>
<head>
    <title>Calendar Viewer</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script>
        // JavaScript for auto-submitting the form on dropdown change
        function autoSubmit() {
            document.getElementById("calendarForm").submit();
        }
    </script>
</head>
<body>
    <div class="container">
        <form method="POST" id="calendarForm" class="form-inline">
            <div class="row">
                <!-- Nepali Year and Month -->
                <div class="year-month np">
                    <span id="nepaliYear"><?php echo $metadata['np']; ?></span>
                </div>

                <!-- Select Boxes -->
                <div class="select-boxes">
                    <select name="year" id="year" onchange="autoSubmit()" required>
                        <?php
                        foreach (getYearFolders('data') as $year) {
                            $selected = ($year == $selectedYear) ? 'selected' : '';
                            echo "<option value=\"$year\" $selected>" . htmlspecialchars($year) . "</option>";
                        }
                        ?>
                    </select>
                    <select name="month" id="month" onchange="autoSubmit()" required>
                        <?php
                        $months = getNepaliMonths();
                        foreach ($months as $num => $name) {
                            $selected = ($num == $selectedMonth) ? 'selected' : '';
                            echo "<option value=\"$num\" $selected>" . htmlspecialchars($name) . "</option>";
                        }
                        ?>
                    </select>
                </div>

                <!-- English Year and Month -->
                <div class="year-month en">
                    <span><?php echo $metadata['en']; ?></span>
                </div>
            </div>
        </form>
        <?php
        // Display the calendar if the file exists
        $filePath = "data/$selectedYear/$selectedMonth.json";
        if (file_exists($filePath)) {
            displayCalendar($selectedYear, $filePath);
        } else {
            echo "<p>No data available for Year: $selectedYear, Month: {$months[$selectedMonth]}.</p>";
        }
        ?>

    </div>

    
</body>
</html>

