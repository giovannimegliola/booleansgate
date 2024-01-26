import Chart from "chart.js/auto";

const data = {
    labels: [
        "August",
        "September",
        "October",
        "November",
        "December",
        "January",
        "February",
    ],
    datasets: [
        {
            label: "Anxiety Level",
            data: [30, 15, 50, 25, 74, 55, 90],
            fill: false,
            borderColor: "rgb(75, 192, 192)",
        },
    ],
};

const config = {
    type: "line",
    data: data,
    options: {
        animations: {
            tension: {
                duration: 3000,
                easing: "linear",
                from: 1,
                to: 0,
                loop: true,
            },
        },
        scales: {
            y: {
                // defining min and max so hiding the dataset does not change scale range
                min: 0,
                max: 100,
            },
        },
    },
};

new Chart(document.getElementById("chartTension"), config);
