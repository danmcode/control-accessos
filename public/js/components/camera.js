//Photo divs
let capturedImageContainer = document.getElementById('capturedImageContainer');
let defaultImageDiv = document.getElementById('defaultImage');
let cameraFeed = document.getElementById('cameraFeed');

//buttons
let openCameraBtn = document.getElementById('openCameraBtn');
let uploadPhotoBtn = document.getElementById('uploadPhotoBtn');
let captureBtn = document.getElementById('captureBtn');
let cancelBtn = document.getElementById('cancelBtn');

//Global Variables
let stream;

//input text
let photoDataInput = document.getElementById('photoDataInput');

// Open Camera button
openCameraBtn.addEventListener('click', () => {

    const img = capturedImageContainer.querySelector('img');

    // Delete the image element from capturedImageContainer div
    if (img) {
        capturedImageContainer.removeChild(img);
    }

    photoDataInput.value = '';

    openCameraBtn.style.display = "none"; // Hide openCameraBtn
    uploadPhotoBtn.style.display = "none"; // Hide uploadPhotoBtn
    defaultImageDiv.style.display = "none"; // Hide defaulImageDiv
    captureBtn.style.display = "inline-block"; // Show captureBtn
    cancelBtn.style.display = "inline-block" // Show cancelBtn

    //Start camera
    openCamera();
});

// Upload Photo
uploadPhotoBtn.addEventListener('click', () => {
    console.log('Upload Photo');
});

//captureBtn
captureBtn.addEventListener('click', () => {

    const img = capturedImageContainer.querySelector('img');

    // Delete the image element from capturedImageContainer div
    if (img) {
        capturedImageContainer.removeChild(img);
    }

    takePhoto()// Capture photo

    openCameraBtn.style.display = "inline-block";// Show openCameraBtn
    uploadPhotoBtn.style.display = "inline-block";// Show uploadCameraBtn
    captureBtn.style.display = "none";// Hide captureBtn
    cancelBtn.style.display = "none";// Hide cancelBtn
});

//cancel photo
cancelBtn.addEventListener('click', () => {
    closeCamera(); // Stop video streaming

    //TODO: Empty captureImageContainer to empty

    captureBtn.style.display = "none";// Hide captureBtn
    cancelBtn.style.display = "none";// Hide cancelBtn
    openCameraBtn.style.display = "inline-block";// Show openCameraBtn
    uploadPhotoBtn.style.display = "inline-block";// Show uploadCameraBtn
    defaultImageDiv.style.display = "block";// Show Default Image Div

    photoDataInput.value = ''; // Set photoDataInput to empty
});


//Open Camera
const openCamera = () => {
    navigator.mediaDevices.getUserMedia({ video: true })
        .then(videoStream => {
            stream = videoStream;

            const video = document.createElement('video');
            video.srcObject = stream;
            video.play();
            cameraFeed.style.display = "block";
            cameraFeed.appendChild(video);
        })
        .catch(error => {
            console.error('Error al acceder a la cámara:', error)
        });
};

// Close Camera
const closeCamera = () => {

    // Stop the streaming video if it's active
    if (stream && stream.getTracks) {
        stream.getTracks().forEach(track => {
            track.stop();
        });
    }

    // Delete the video element from streaming div
    const video = cameraFeed.querySelector('video');

    if (video) {
        cameraFeed.removeChild(video);
    }
};

//Take a photo
const takePhoto = () => {
    const video = cameraFeed.querySelector('video');

    // Crear un lienzo (canvas) para dibujar la foto capturada
    const canvas = document.createElement('canvas');
    const context = canvas.getContext('2d');

    // Establecer las dimensiones del lienzo según el tamaño del video
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;

    // Dibujar el video en el lienzo
    context.drawImage(video, 0, 0, canvas.width, canvas.height);

    // Obtener los datos de la imagen en formato base64
    const photoData = canvas.toDataURL('image/jpeg');

    // Crear un elemento de imagen para mostrar la foto capturada
    const image = document.createElement('img');
    image.src = photoData;

    // Agregar la imagen al contenedor de imágenes capturadas
    capturedImageContainer.appendChild(image);

    // Asignar los datos de la foto al campo oculto del formulario
    photoDataInput.value = photoData;

    // Detener la transmisión de video
    video.pause();
    video.srcObject = null;

    // Eliminar el elemento de video del div de transmisión en vivo
    cameraFeed.removeChild(video);

    closeCamera(); // Stop video streaming
}