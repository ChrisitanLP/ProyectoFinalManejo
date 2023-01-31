$("#subirfoto").click(function(){
    navigator.mediaDevices.getUserMedia({audio: false, video: true}).then((stream)=>{
        console.log(stream)
        let video=document.getElementById('video')
        video.srcObject=stream
        video.onloadedmetadata=(ev)=>video.play()
    }).catch((err)=>console.log(err))
    
    document.getElementById("tomarfoto").addEventListener("click",()=>{
        tomarfoto();
    })

    function tomarfoto(){
        const canvas=document.getElementById("canvas");
        let cxt=canvas.getContext('2d');
        cxt.drawImage(video,0,0,video.videoWidth,video.videoHeight);
    }
});


$("#guardarfoto").click(function(){
    let canvas = document.getElementById("canvas");
    let link = window.document.createElement('a');
    let url = canvas.toDataURL();
    let filename = 'foto.jpg';

    link.setAttribute('href', url);
    link.setAttribute('download', filename);
    link.style.visibility = 'hidden';
    window.document.body.appendChild(link);
    link.click();
    window.document.body.removeChild(link);
});
