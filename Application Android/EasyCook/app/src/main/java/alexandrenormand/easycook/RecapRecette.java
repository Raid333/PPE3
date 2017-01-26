package alexandrenormand.easycook;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.Spinner;
import android.widget.TextView;

public class RecapRecette extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_recap_recette);
        Intent intent = getIntent();

        Button btn_return = (Button)findViewById(R.id.btn_return);
        btn_return.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(RecapRecette.this, MainActivity.class);
                startActivity(intent);


            }
        });

        // Affichage de la valeur du champ "nom de la recette"
        String NomRecette = intent.getStringExtra("NomRecette");
        TextView name_txt = (TextView) findViewById(R.id.name_txt);
        name_txt.setText(NomRecette);

        // Affichage de la valuer du champ "description de la recette"
        String DescriptionRecette = intent.getStringExtra("DescriptionRecette");
        TextView descri_txt = (TextView) findViewById(R.id.descri_txt);
        descri_txt.setText(DescriptionRecette);

        // Affichage de la valeur du spinner "Type Recette"
        String TypeRecette = intent.getStringExtra("TypeRecette");
        TextView type_txt = (TextView) findViewById(R.id.type_txt);
        type_txt.setText(TypeRecette);


    }


}
