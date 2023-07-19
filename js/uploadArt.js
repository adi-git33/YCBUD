function showData(data){
    const DataCon = document.getElementById('dataServices');
      for (const art in data.arts){
        const artPiece = document.createElement('section');
        artPiece.id = data.arts[art].art_id;
        artPiece.innerHTML = `<img class="activistArt" src="${data.arts[art].art_path}" alt="${data.arts[art].art_name}">`;
        DataCon.appendChild(artPiece);
      }
    }


fetch("data/activistArt.json")
  .then(response => response.json())
  .then(data => showData(data));

let images = document.getElementsByClassName('activistArt');
let wrapper = document.getElementById('imageWrapper');
let imgWrapper = document.getElementById('fullImg');
let closeImg = document.getElementById('closeArt');

console.log(images);
let imageArray = Array(images);

console.log(imageArray);

    for (let i=0; i< images.length ; i++){
        images[i].addEventListener("click",()=>{
            const pic = images[i].src;
            openModal(pic);
        })
    }

function openModal(pic){
    wrapper.style.display = 'flex';
    imgWrapper.src = pic;
}
