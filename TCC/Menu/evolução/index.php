<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Antes e Depois de Imagens</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <br>
    
    <div class="container">
        <h2>Evolução do Aluno</h2>
        <div class="image-comparison">
            <div class="preview-img before">
                <h3>Antes</h3>
                <img src="image-placeholder.svg" alt="" id="beforeImg">
            </div>
            <br>
            <div class="preview-img after">
                <h3>Depois</h3>
                <img src="image-placeholder.svg" alt="" id="afterImg">
            </div>
            <br>
        </div>

        <div class="controls">
            <input type="file" id="beforeInput" accept="image/*">
            <input type="file" id="afterInput" accept="image/*">
            <br>
            <br>
            <button id="uploadBtn">Carregar Imagens</button>
            <br>
        </div>

        <div class="pdf-controls">
            <button id="resetBtn">Redefinir Imagens</button>
            <button id="view-pdf">Visualizar PDF</button>
            <button id="generate-pdf">Gerar PDF</button>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="script.js">
    </script>
    <script>
        
    // Função para gerar o PDF com as imagens
document.getElementById('generate-pdf').addEventListener('click', async () => {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();
    const images = Array.from(document.querySelectorAll('img'));

    const imgWidth = 75; 
    const imgHeight = 75; 
    const x1 = 5; 
    const x2 = 100; 
    let y = 10; 

    for (let i = 0; i < images.length; i++) {
        const img = images[i].src;
        let label = ""; 
        let xPosition = x1; 

        if (i === 0) {
            label = "Antes"; 
            xPosition = x1; 
        } else if (i === 1) {
            label = "Depois"; 
            xPosition = x2; 
        }

        if (label) {
            doc.text(label, xPosition, y);
        }

        const imgData = await fetch(img)
            .then(res => res.blob())
            .then(blob => {
                return new Promise((resolve) => {
                    const reader = new FileReader();
                    reader.onloadend = () => resolve(reader.result);
                    reader.readAsDataURL(blob);
                });
            });

        doc.addImage(imgData, 'JPEG', xPosition, y + 10, imgWidth, imgHeight);
    }

    doc.save('imagens.pdf');
});

// Função para visualizar o PDF gerado em uma nova aba
document.getElementById('view-pdf').addEventListener('click', async () => {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();
    const images = Array.from(document.querySelectorAll('img'));

    const imgWidth = 75; 
    const imgHeight = 75; 
    const x1 = 5; 
    const x2 = 100; 
    let y = 10; 

    for (let i = 0; i < images.length; i++) {
        const img = images[i].src;
        let label = ""; 
        let xPosition = x1; 

        if (i === 0) {
            label = "Antes"; 
            xPosition = x1; 
        } else if (i === 1) {
            label = "Depois"; 
            xPosition = x2; 
        }

        if (label) {
            doc.text(label, xPosition, y);
        }

        const imgData = await fetch(img)
            .then(res => res.blob())
            .then(blob => {
                return new Promise((resolve) => {
                    const reader = new FileReader();
                    reader.onloadend = () => resolve(reader.result);
                    reader.readAsDataURL(blob);
                });
            });

        doc.addImage(imgData, 'JPEG', xPosition, y + 10, imgWidth, imgHeight);
    }

    const pdfData = doc.output('blob');
    const pdfUrl = URL.createObjectURL(pdfData);
    window.open(pdfUrl, '_blank');
});

// Função para redefinir as imagens e campos de entrada para o valor inicial
document.getElementById('resetBtn').addEventListener('click', () => {
    document.getElementById('beforeImg').src = 'image-placeholder.svg';
    document.getElementById('afterImg').src = 'image-placeholder.svg';
    document.getElementById('beforeInput').value = '';
    document.getElementById('afterInput').value = '';
});

    </script>
</body>
</html>
