```markdown
# Nepali Calendar

This project displays a Nepali calendar with holidays and festivals. It includes functionality to view the calendar for different months and years, and highlights today's date.

## Features

- Display Nepali calendar with English and Nepali dates.
- Highlight today's date.
- Show holidays and festivals for the selected month.
- Automatically load the current month and year on page refresh.

## Installation

1. Clone the repository:
   ```sh
   git clone https://github.com/your-username/nepali-calendar.git
   ```
   ```sh
   cd nepali-calendar
   ```

2. Ensure you have PHP installed on your machine.

3. Start a local server (e.g., using XAMPP or built-in PHP server):
   ```sh
   php -S localhost:8000
   ```

4. Open your browser and navigate to `http://localhost:8000`.

## Usage

- The calendar will automatically load the current month and year.
- Use the dropdowns to select a different year and month.
- The holidays and festivals for the selected month will be displayed below the calendar.

## File Structure

- 

index.php

: Main file that displays the calendar.
- 

style.css

: Stylesheet for the calendar.
- 

data

: Directory containing JSON files for each month and year.
- 

README.md

: This file.

## JSON Data Format

Each JSON file in the 

data

 directory should follow this format:

```json
{
  "metadata": {
    "en": "Jan/Feb 2024",
    "np": "माघ 2081"
  },
  "days": [
    {
      "n": "१",
      "e": "15",
      "t": "पुर्णिमा",
      "f": "पशुपतिनाथको छायाँ दर्शन",
      "h": false,
      "d": 1
    },
    ...
  ],
  "holiFest": [
    "०१माघे संक्रान्ति, माघी पर्व, देवघाटमा मकरस्नान आरम्भ",
    "०२राष्ट्रिय भुकम्प सुरक्षा दिवस",
    ...
  ],
  "marriage": ["४ र २५ गते"],
  "bratabandha": ["२ ,३ ,१८ र २५ गते"]
}
```

## Contributing

1. Fork the repository.
2. Create a new branch (`git checkout -b feature-branch`).
3. Make your changes.
4. Commit your changes (`git commit -am 'Add new feature'`).
5. Push to the branch (`git push origin feature-branch`).
6. Create a new Pull Request.

## License

This project is licensed under the MIT License - see the LICENSE file for details.
```

### Explanation:
1. **Project Title and Description**: Provides a brief overview of the project.
2. **Features**: Lists the main features of the project.
3. **Installation**: Instructions on how to clone the repository and set up the project.
4. **Usage**: Explains how to use the calendar.
5. **File Structure**: Describes the main files and directories in the project.
6. **JSON Data Format**: Provides an example of the expected JSON data format.
7. **Contributing**: Instructions for contributing to the project.
8. **License**: Information about the project's license.

Replace `https://github.com/your-username/nepali-calendar.git` with the actual URL of your GitHub repository.
### Explanation:
1. **Project Title and Description**: Provides a brief overview of the project.
2. **Features**: Lists the main features of the project.
3. **Installation**: Instructions on how to clone the repository and set up the project.
4. **Usage**: Explains how to use the calendar.
5. **File Structure**: Describes the main files and directories in the project.
6. **JSON Data Format**: Provides an example of the expected JSON data format.
7. **Contributing**: Instructions for contributing to the project.
8. **License**: Information about the project's license.

Replace `https://github.com/your-username/nepali-calendar.git` with the actual URL of your GitHub repository.

Similar code found with 1 license type