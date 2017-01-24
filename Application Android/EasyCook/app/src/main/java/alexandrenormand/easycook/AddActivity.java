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

        Button btn_valide = (Button) findViewById(R.id.btn_valide);

        type_spin = (Spinner)findViewById(R.id.type_spin);
        adapter = ArrayAdapter.createFromResource(this,R.array.type_recette,android.R.layout.simple_spinner_item);
        adapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        type_spin.setAdapter(adapter);

        btn_valide.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(AddActivity.this, RecapRecette.class);
                startActivity(intent);
                EditText editName = (EditText) findViewById(R.id.editName);
                //Récupére la chaine de caractère de l'objet Text (editText)
                String name = editName.getText().toString();
                intent.putExtra("message", name);
                startActivityForResult(intent, 0);
            }



        });



    }
}
