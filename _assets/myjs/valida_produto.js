function recuperaId(id) {
  return document.getElementById(id);
}

recuperaId("insert").addEventListener("click", (event) => {
  if (recuperaId("produto").value == "") {
    event.preventDefault();
    recuperaId("msgErro").innerHTML =
      "Ops... Atenção! O Campo Nome é Obrigatório";
  } else if (
    recuperaId("preco").value == "" ||
    recuperaId("preco").value <= 0
  ) {
    event.preventDefault();
    recuperaId("msgErro").innerHTML =
      "Ops... Atenção! O Campo Preço é Obrigatório e deve ser Maior que 0";
  } else {
    alert("Produto Salvo com sucesso!");
  }
});


//botão atualizar
recuperaId("atualizar").addEventListener("click", (event) => {
  if (recuperaId("produto").value == "") {
      event.preventDefault();
      recuperaId("msgErro").innerHTML =
          "Ops... Atenção! O Campo Nome é Obrigatório";
  } else if (
      recuperaId("preco").value == "" ||
      recuperaId("preco").value <= 0
  ) {
      event.preventDefault();
      recuperaId("msgErro").innerHTML =
          "Ops... Atenção! O Campo Preço é Obrigatório e deve ser Maior que 0";
  } else {
      alert("Produto Salvo com sucesso!");
  }
});
