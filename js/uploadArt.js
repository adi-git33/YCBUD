function showData(data){
    // let images = document.getElementsByClassName('activistArt');
    let imgPath = document.getElementById('selectedImagePath');
    let imgId = document.getElementById('selectedImageId');
    let wrapper = document.getElementById('imageWrapper');
    let imgWrapper = document.getElementById('fullImg');
    let closeImg = document.getElementById('closeArt');
    const DataCon = document.getElementById('dataServices');
      for (const art in data.arts){
        const artPiece = document.createElement('section');
        artPiece.id = data.arts[art].art_id;
        artPiece.innerHTML = `<img class="activistArt" src="${data.arts[art].art_path}" alt="${data.arts[art].art_name}">`;
        DataCon.appendChild(artPiece);

        artPiece.addEventListener('click',()=>{
            imgWrapper.src = data.arts[art].art_path;
            imgWrapper.alt = data.arts[art].art_name;
            imgPath.value = data.arts[art].art_path; 
            imgId.value = data.arts[art].art_id;
            wrapper.style.display = 'flex';
        });
      }
        closeImg.addEventListener('click',()=>{
            wrapper.style.display = 'none';
        })
    }



fetch("data/activistArt.json")
  .then(response => response.json())
  .then(data => showData(data));

