function fillNameInputs(nom, prenom) {
    console.log(nom);
    const lastname = document.getElementById("nom");
    const firstname = document.getElementById("prenom");
    lastname.value = nom;
    firstname.value = prenom;
}