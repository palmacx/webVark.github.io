function resultado() {
    let visual = 0, auditivo = 0, kinestesico = 0, lector = 0;
    let totalRespuestasMarcadas = 0;

    const modal_container1 = document.getElementById('modal_container1');
    const modal_container2 = document.getElementById('modal_container2');
    const modal_container3 = document.getElementById('modal_container3');
    const modal_container4 = document.getElementById('modal_container4');

    // Evaluar todas las preguntas (IDs p11 a p204)
    for (let i = 1; i <= 20; i++) {
        for (let j = 1; j <= 4; j++) {
            const radio = document.getElementById(`p${i}${j}`);
            if (radio && radio.checked) {
                if (j === 1) visual++;
                if (j === 2) auditivo++;
                if (j === 3) kinestesico++;
                if (j === 4) lector++;
                totalRespuestasMarcadas++;
                break;
            }
        }
    }

    // Validar si todas las preguntas fueron respondidas
    if (totalRespuestasMarcadas < 20) {
        alert("Error, favor de contestar todas las preguntas del test.");
        return;
    }

    // Calcular los resultados
    const puntajes = { visual, auditivo, kinestesico, lector };
    const tipos = Object.keys(puntajes).sort((a, b) => puntajes[b] - puntajes[a]);
    const tipoPrincipal = tipos[0];
    const tipoSecundario = tipos[1];

    // Texto para el estilo secundario
    let textoSecundario = '';
    switch (tipoSecundario) {
        case 'visual':
            textoSecundario = '<h3>Estilo Secundario: Visual</h3><p>Aprendes mejor con imágenes, gráficos, y videos.</p>';
            break;
        case 'auditivo':
            textoSecundario = '<h3>Estilo Secundario: Auditivo</h3><p>Prefieres explicaciones, debates, o audios.</p>';
            break;
        case 'kinestesico':
            textoSecundario = '<h3>Estilo Secundario: Kinestésico</h3><p>Te gusta aprender practicando y experimentando.</p>';
            break;
        case 'lector':
            textoSecundario = '<h3>Estilo Secundario: Lector-Escritor</h3><p>Prefieres leer y escribir para aprender.</p>';
            break;
    }

    // Mostrar el modal correspondiente según el tipo principal
    const selectedModal = document.getElementById(`modal_container${tipos.indexOf(tipoPrincipal) + 1}`);
    const modalContent = selectedModal.querySelector('.modal');
    modalContent.innerHTML += textoSecundario; // Agregar texto secundario al modal
    selectedModal.classList.add('show');

    // Configurar botones de cierre para todos los modales
    document.getElementById('close1').addEventListener('click', () => {
        modal_container1.classList.remove('show');
    });
    document.getElementById('close2').addEventListener('click', () => {
        modal_container2.classList.remove('show');
    });
    document.getElementById('close3').addEventListener('click', () => {
        modal_container3.classList.remove('show');
    });
    document.getElementById('close4').addEventListener('click', () => {
        modal_container4.classList.remove('show');
    });

    // Guardar resultados en la base de datos mediante AJAX
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "guardar_resultado.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                console.log("Resultado guardado en la base de datos:", xhr.responseText);
            } else {
                console.error("Error al guardar el resultado en la base de datos:", xhr.status, xhr.statusText);
            }
        }
    };
    xhr.send(`tipoPrincipal=${encodeURIComponent(tipoPrincipal)}&tipoSecundario=${encodeURIComponent(tipoSecundario)}`);
}
