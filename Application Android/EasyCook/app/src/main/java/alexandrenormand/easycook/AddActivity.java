package alexandrenormand.easycook;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Spinner;

public class AddActivity extends AppCompatActivity {
    Spinner type_spin;
    ArrayAdapter<CharSequence> adapter;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_add);
        setTitle("Easy Cook - Ajouter une recette");

        Button btn_valide = (Button) findViewById(R.id.btn_valide);

        type_spin = (Spinner)findViewById(R.id.type_spin);
        adapter = ArrayAdapter.createFromResource(this,R.array.type_recette,android.R.layout.simple_spinner_item);
        adapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        type_spin.setAdapter(adapter);


        //Récupératino du champ : "Description Recette"


        btn_valide.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(AddActivity.this, RecapRecette.class);

                //Récupére la chaine Nom Recette
                EditText editName = (EditText) findViewById(R.id.editName);
                String name = editName.getText().toString();
                intent.putExtra("NomRecette", name);

                //Récupére le chaine Description
                EditText editDescri = (EditText)findViewById(R.id.editDescri);
                String DescriptionRecette = editDescri.getText().toString();
                intent.putExtra("DescriptionRecette", DescriptionRecette);

                //Récupére la valeur du spinner
                Spinner type_spin = (Spinner) findViewById(R.id.type_spin);
                String typeRecette = type_spin.getSelectedItem().toString();
                intent.putExtra("TypeRecette", typeRecette);


                startActivity(intent);
            }



        });



    }
}
