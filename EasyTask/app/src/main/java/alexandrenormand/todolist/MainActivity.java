package alexandrenormand.todolist;

import android.content.ContentValues;
import android.content.DialogInterface;
import android.database.Cursor;
import android.database.SQLException;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.text.InputFilter;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.EditText;
import android.widget.ListView;
import android.widget.TextView;
import android.widget.Toast;

import java.util.ArrayList;

import static android.support.v7.app.AlertDialog.*;

public class MainActivity extends AppCompatActivity {

    private static final String TAG = "MainActivity";
    private TaskDbHelper mHelper;
    private ListView mTaskListView;
    private ArrayAdapter mAdapter;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        // initialise le layout à afficher
        setContentView(R.layout.activity_main);
        // Recupère l'objet listView dans le layout
        mTaskListView = (ListView) findViewById(R.id.list_todo);
        updateListView();


    }


        private void updateListView() {
       // Connexion à la base de donnée
        mHelper = new TaskDbHelper(this);
        SQLiteDatabase db = mHelper.getReadableDatabase();
        // Lecture des enregistrements
        Cursor cursor = db.query(TaskContract.TaskEntry.TABLE,
                new String[] {  TaskContract.TaskEntry._ID,
                                TaskContract.TaskEntry.COL_TASK_TITLE},
                null, null, null, null, null);
        // Conversion en un tableau de chaine de caractère
        ArrayList<String> taskList = new ArrayList();
        while (cursor.moveToNext()) {
            int idx =  cursor.getColumnIndex(TaskContract.TaskEntry.COL_TASK_TITLE);
            String task = cursor.getString(idx);
            Log.d(TAG, "Task : " + task);
            taskList.add(task);
        }
        // Fermeture de la requete et de la base de données
        cursor.close();
        db.close();
        // Création d'un adapter pour la listview
        if (mAdapter == null) {
            // Non existant..
            //Création avec la liste et un layout
            mAdapter = new ArrayAdapter<>(this, R.layout.item_todo,
                R.id.task_title, taskList);
            mTaskListView.setAdapter(mAdapter);

        }
        else {
            //Déjà existant
            // RAZ puis maj de la liste
            mAdapter.clear();
            mAdapter.addAll(taskList);
            mAdapter.notifyDataSetChanged();
        }
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu){
        getMenuInflater().inflate(R.menu.main_menu, menu);
        return super.onCreateOptionsMenu(menu);

        
    }
    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        switch(item.getItemId()) {
            case R.id.action_add_task:
                Log.d(TAG, "Add new task");
                final EditText taskEditText = new EditText(this);
                int maxLenght = 28;
                taskEditText.setFilters(new InputFilter[] {new InputFilter.LengthFilter(maxLenght)});
                AlertDialog dialog = new AlertDialog.Builder(this)
                    .setTitle(getString(R.string.title_new_task))
                    .setMessage(getString(R.string.what_do_you_want))
                    .setView(taskEditText)
                    .setPositiveButton(getString(R.string.btn_add), new DialogInterface.OnClickListener() {

                                @Override
                                public void onClick(DialogInterface dialogInterface, int i) {
                                    // Récupère le texte tapé par l'utilisateur
                                    String task = String.valueOf(taskEditText.getText());              Log.d(TAG, "Task to add : " + task);
                                    // Enregistrement dans la base de donnée
                                    SQLiteDatabase db = mHelper.getWritableDatabase();
                                    ContentValues values = new ContentValues();
                                    values.put(TaskContract.TaskEntry.COL_TASK_TITLE, task);
                                    db.insertWithOnConflict(TaskContract.TaskEntry.TABLE,
                                            null,
                                            values,
                                            SQLiteDatabase.CONFLICT_REPLACE);
                                    db.close();
                                    updateListView();
                                }
                            }
                    )
                        .setNegativeButton(getString(R.string.btn_cancel), null)
                        .create();
                dialog.show();
                return true;

            default:
                return super.onOptionsItemSelected(item);
        }

    }
    public void deleteTask(View view) {
                                    //Message de trace

        // Récupère le parent du button : càd le layout
        View parent = (View) view.getParent();
        // récupère le textview de la tâche
        TextView taskTextView = (TextView) parent.findViewById(R.id.task_title);
        // Récupère le text de la tâche
        String task = String.valueOf(taskTextView.getText());
        // Connexion à la base de données pour écriture
        SQLiteDatabase db = mHelper.getWritableDatabase();
        // Suppression des tâches ayant le texte
        // !!! Il faudra gérer des id pour une version plus évoluée
        db.delete(TaskContract.TaskEntry.TABLE,
                TaskContract.TaskEntry.COL_TASK_TITLE + " =  ?",
                new String[]{task} );
        db.close();
        updateListView();

    }
}
