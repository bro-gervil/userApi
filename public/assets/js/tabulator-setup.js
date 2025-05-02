$(document).ready(function () {
    var tabledata = [
        {% for  etudiant in etudiants %}
        {
        "etudiant": "{{etudiant.student.last_name}} {{etudiant.first_name}}",

        {% for matiere, notes in notes_par_matiere.items %}

"{{ matiere }}_ecrit" :
{% for note in notes %}
{   % if note.student_id == etudiant %}
{ { note.examan1 } }
{% endif %}
{% endfor %},
"{{ matiere }}_tp":
{% for  note in notes %}
{% if note.student_id == etudiant %}
{ { note.notetp } }
{% endif %}
{% endfor %},
"{{ matiere }}_moyenne":
{% for note in notes %}
{% if note.student_id == etudiant %}
{ { note.moyenne } }
{% endif %}
{% endfor %},
    },
{% endfor %}
    ];

var colonne = [
    { title: "Etudiant", field: "etudiant" },
    {% for matiere in matieres %}
{ title: "{{matiere.title}} ECRIT", field: "{{matiere.title}}_ecrit" },
{ title: "{{matiere.title}} Moyenne", field: "{{matiere.title}}_moyenne" },
{% endfor %}
];


var table = new Tabulator("#table-holder", {
    data: tabledata,
    columns: columns,
    printAsHtml: true,
    printStyled: true,
    printHeader: function () {
        var elm = document.getElementById("header");
        return elm;
    },
    printFooter: "<div class='text-center' style='margin-top:130px';><small>Faculté des Sciences / Département de Sciences de la vie et de la Terre - Procès Verbal</small></div>",


    layout: "fitColumns", //fit columns to width of the table
    history: true,  //allow undo and redo actions on the table
    headerSortClickElement: "header",
    selectableRange: true,
    selectableRangeColums: true,
    selectableRangeClearCells: true, // allow to clear all datas selected 
    editTriggerEvent: "dbclick", // allow double click when editing
    clipboard: true,
    clipboardCopyRowRange: "range",
    clipboardPasteParser: "range",
    clipboardPasteAction: "range",
    clipboardCopyConfig: {
        rowHeader: false, //do not include row header in the clipboard output
        columnHeaders: false, //do not include column headers in the clipboard output
    },
    clipboardCopyStyled: false,

    columnDefaults: {
        tooltip: true, //show tool tips on cells
    },

});


document.getElementById("print-table").addEventListener("click", function () {

    table.print(false, true); // Impression de la table
});

document.getElementById("csv-file").addEventListener("click", function () {
    table.download("xlsx", "data.xlsx");
});


});