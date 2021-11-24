//include 'setup' then 'config' above
const labels = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
    'July',
    'August',
    'September',
    'October',
    'November',
    'December',
];
const data = {
labels: labels,
datasets: [{
    label: 'Page Views',
    backgroundColor: '#000',
    borderColor: '#333',
    data: [0, 10, 5, 2, 20, 30, 45],
}]
};

const config = {
    type: 'line',
    data,
    options: {}
};

var myChart = new Chart(
    document.getElementById('myChart'),
    config
);
