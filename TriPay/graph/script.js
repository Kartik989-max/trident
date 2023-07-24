// Get the container element where the cryptocurrency values will be displayed
const container = document.getElementById("crypto-container");

// Function to retrieve the cryptocurrency values from the API
async function getCryptoValues() {
  try {
    // Retrieve the data from the API
    const response = await fetch("https://api.coincap.io/v2/assets");
    const data = await response.json();

    // Loop through the data and display the cryptocurrency values
    container.innerHTML = "";
    data.data.forEach(crypto => {
      const item = document.createElement("div");
      item.classList.add("crypto-item");
      item.innerHTML = `
        <h2>${crypto.name}</h2>
        <p>${crypto.symbol}: ${parseFloat(crypto.priceUsd).toFixed(2)} USD</p>
      `;
      container.appendChild(item);
    });
  } catch (error) {
    console.error(error);
  }
}

// Call the function initially to display the cryptocurrency values
getCryptoValues();

// Call the function every 5 seconds to update the cryptocurrency values
setInterval(getCryptoValues, 5000);
