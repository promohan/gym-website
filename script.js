// 5. 3D Tilt Card Interaction (Vanilla implementation)
document.querySelectorAll('.tilt-card').forEach(card => {
    card.addEventListener('mousemove', (e) => {
        const { left, top, width, height } = card.getBoundingClientRect();
        const x = (e.clientX - left) / width - 0.5;
        const y = (e.clientY - top) / height - 0.5;

        gsap.to(card, {
            rotationY: x * 20,
            rotationX: -y * 20,
            transformPerspective: 1000,
            ease: "power1.out",
            duration: 0.3
        });
    });

    card.addEventListener('mouseleave', () => {
        gsap.to(card, { rotationY: 0, rotationX: 0, duration: 0.5 });
    });
});



// trainer slider functionality
function scrollSlider(direction) {
    const slider = document.getElementById('trainerSlider');
    const scrollAmount = 380; // Card width + gap
    slider.scrollBy({
        left: direction * scrollAmount,
        behavior: 'smooth'
    });
}

// application form//

function switchTab(type) {
    const tabs = document.querySelectorAll('.tab');
    const forms = document.querySelectorAll('.form-content');

    tabs.forEach(t => t.classList.remove('active'));
    forms.forEach(f => f.classList.remove('active'));

    if (type === 'login') {
        tabs[0].classList.add('active');
        document.getElementById('loginForm').classList.add('active');
    } else {
        tabs[1].classList.add('active');
        document.getElementById('registerForm').classList.add('active');
    }
}

// function handleLogin(e) {
//     e.preventDefault();
//     alert("Successfully Login!");
// }

// function handleRegister(e) {
//     e.preventDefault();
//     alert("Successfully Register!");
// }



function handleRegister(event) {
    // Perform your checks
    if (document.getElementsByName('username')[0].value === "") {
        alert("Name is required!");
        event.preventDefault(); // Stop submission because there is an error
        return false;
    }
    
    // If everything is okay, DON'T call preventDefault()
    // The form will now continue to your PHP script.
    return true; 
}


// gallary //
document.getElementById('load-more-btn').addEventListener('click', function() {
    // Select all hidden gallery items
    const hiddenItems = document.querySelectorAll('.gallery-item.hidden');
    
    // We want to show the next 4 items
    const itemsToShow = 4;

    for (let i = 0; i < itemsToShow; i++) {
        if (hiddenItems[i]) {
            hiddenItems[i].classList.remove('hidden');
        }
    }

    // If no more hidden items left, hide the button
    // if (document.querySelectorAll('.gallery-item.hidden').length === 0) {
    //     this.style.display = 'none';
    // }
});