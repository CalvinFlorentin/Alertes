$(document).ready(function() {
    $('#tableDonnees').DataTable({
        "language": {
            "emptyTable":     "Aucune donnée disponible",
            "info":           "Affichage des lignes _START_ à _END_ sur _TOTAL_ lignes au total",
            "infoEmpty":      "0 ligne affichée",
            "infoFiltered":   "(Filtré à partir du total de _MAX_ entrées)",
            "infoPostFix":    "",
            "thousands":      ".",
            "lengthMenu":     "Afficher _MENU_ lignes par page",
            "loadingRecords": "Chargement des données...",
            "processing":     "En cours de traitement...",
            "search":         "Recherche : ",
            "zeroRecords":    "Aucun résultat ne correspont à votre recherche",
            "paginate": {
                "first":      "Permier",
                "last":       "Dernier",
                "next":       "Suivant",
                "previous":   "Précédent"
            },
            "aria": {
                "sortAscending":  " : activer pour trier la colonne en ordre croissant",
                "sortDescending": " : activer pour trier la colonne en ordre décroissant"
            }
        }
    });
} );