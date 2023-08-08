<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transcrição de Fala com Play e Pause</title>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    

</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">SPEECH TO TEXT</h1>
        <button id="startBtn" class="btn btn-primary">Iniciar</button>
        <button id="stopBtn" class="btn btn-secondary" disabled>Parar</button>
        <p id="transcriptionResult" class="mt-4"></p>
    </div>
    <div class="container mt-5">
        <input type="button" class="btn btn-success" id="submit" value="enviar">
    </div>

   
    
   
    <script>
    let recognition;
    let fullTranscript = '';

    document.getElementById('startBtn').addEventListener('click', () => {
        if ('webkitSpeechRecognition' in window) {
            recognition = new webkitSpeechRecognition();
            recognition.continuous = true;
            recognition.interimResults = true;
            recognition.lang = 'pt-BR';

            recognition.onstart = () => {
                document.getElementById('startBtn').disabled = true;
                document.getElementById('pauseBtn').disabled = false;
                document.getElementById('stopBtn').disabled = false;
                document.getElementById('resumeBtn').disabled = true;
                fullTranscript = '';
            };

            recognition.onend = () => {
                document.getElementById('startBtn').disabled = false;
                document.getElementById('pauseBtn').disabled = true;
                document.getElementById('stopBtn').disabled = true;
                document.getElementById('resumeBtn').disabled = true;
            };

            recognition.onresult = (event) => {
                let interimTranscript = '';
                for (let i = event.resultIndex; i < event.results.length; i++) {
                    const result = event.results[i][0];
                    if (result.isFinal) {
                        fullTranscript += result.transcript;
                    } else {
                        interimTranscript += result.transcript;
                    }
                }
                document.getElementById('transcriptionResult').textContent = fullTranscript +
                    interimTranscript;
            };

            recognition.onerror = (event) => {
                console.error('Erro na transcrição:', event.error);
            };

            recognition.start();
        } else {
            alert('O navegador não suporta a API Web Speech Recognition.');
        }
    });



    document.getElementById('stopBtn').addEventListener('click', () => {
        if (recognition) {
            recognition.stop();
        }
    });
    </script>

</body>

</html>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
$("#submit").click(function() {
           
            var mensagem = $("#transcriptionResult").text();
            alert(mensagem);
           
            $.ajax({
                type: "POST",
                url: "php/save_mail.php", 
                data: {
                    message: mensagem
                },
                success: function(result) {
                   
                    alert("Mensagem enviada por email e registrada no banco!");
                },
                error: function(xhr, status, error) {
                    
                    console.log(xhr.responseText);
                }
            });

        });
</script>