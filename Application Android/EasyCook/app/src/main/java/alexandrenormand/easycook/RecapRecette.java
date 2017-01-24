package alexandrenormand.easycook;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

public class RecapRecette extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_recap_recette);

        Button btn_return = (Button)findViewById(R.id.btn_return);
        btn_return.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(RecapRecette.this, MainActivity.class);
                startActivity(intent);
            }
            EditText editName = (EditText) findViewById(R.id.name_txt);
            String text = editName.getText().toString();
            intent.putExtra("message", text);
        });
    }
}
