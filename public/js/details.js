document.querySelector('.view-deal-btn').addEventListener('click', () => {
    const roomTypeSection = document.getElementById('room_type');
    roomTypeSection.scrollIntoView({ behavior: 'smooth' });
});

document.querySelector('.view-deal-btn').addEventListener('click', () => {
    const roomTypeSection = document.getElementById('room_type');
    roomTypeSection.scrollIntoView({ behavior: 'smooth' });

    // Add highlight class for effect
    roomTypeSection.classList.add('highlight');
    setTimeout(() => {
        roomTypeSection.classList.remove('highlight');
    }, 1500);
});

// Function to open modal and display images
function openPhotoModal(images) {
    const modal = document.getElementById("photoModal");
    const modalContent = modal.querySelector(".modal-content");

    // Clear previous content
    modalContent.innerHTML = '<span class="close">&times;</span>';

    // Add images
    images.forEach((imgSrc) => {
        const img = document.createElement("img");
        img.src = imgSrc;
        modalContent.appendChild(img);
    });

    // Show the modal
    modal.style.display = "block";

    // Close button functionality
    modal.querySelector(".close").addEventListener("click", () => {
        modal.style.display = "none";
    });
}

// Attach event listener to the "See all photos" button
document.querySelectorAll(".see-all-photos").forEach((button, index) => {
    button.addEventListener("click", () => {
        // Example image sources for the modal (replace these with actual paths)
        const hotelImages = [
            "images/hotel-1.jpg",
            "images/hotel-2.jpg",
            "images/hotel-3.jpg",
            "images/hotel-4.jpg",
        ];
        openPhotoModal(hotelImages);
    });
});

document.querySelectorAll('.book-now-btn').forEach(button => {
    button.addEventListener('click', () => {
        // Show the custom alert
        const customAlert = document.getElementById('custom-alert');
        customAlert.classList.remove('hidden');

        // Handle OK button click
        const okButton = document.getElementById('alert-ok-btn');
        okButton.addEventListener('click', () => {
            customAlert.classList.add('hidden');
            window.location.href = "confirmation.html";
        });
    });
});
