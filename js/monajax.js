function selectMedicaments() {

    var vDepot = encodeURIComponent(document.getElementById('medicaments').value);

    $.ajax({
        type: 'GET',
        url: 'controleurs/reqAjaxSelectMedi.php?depot=' + vDepot + '',
        timeout: 3000,
        async: false,
        success: function (data) {

            obj = JSON.parse(data);

              document.getElementById('depotLegal').value = obj.MED_DEPOTLEGAL ;
              document.getElementById('nomCommercial').value = obj.MED_NOMCOMMERCIAL;
              document.getElementById('famille').value = obj.FAM_LIBELLE ;
              document.getElementById('composition').value = obj.MED_COMPOSITION;
              document.getElementById('effet').value = obj.MED_EFFETS;
              document.getElementById('contreIndic').value = obj.MED_CONTREINDIC;
              document.getElementById('prixEchan').value = obj.MED_PRIXECHANTILLON;


        },
        error: function () {
            alert("Problème");
        }
    });

}
