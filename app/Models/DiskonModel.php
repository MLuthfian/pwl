namespace App\Models;

use CodeIgniter\Model;

class DiskonModel extends Model
{
    protected $table      = 'diskon';
    protected $primaryKey = 'id';
    protected $allowedFields = ['tanggal', 'nominal'];

    protected $validationRules = [
        'tanggal' => 'required|is_unique[diskon.tanggal]',
        'nominal' => 'required|integer'
    ];

    protected $validationMessages = [
        'tanggal' => [
            'is_unique' => 'Tanggal diskon sudah ada.',
            'required'  => 'Tanggal wajib diisi.'
        ],
        'nominal' => [
            'required' => 'Nominal wajib diisi.',
            'integer'  => 'Nominal harus angka.'
        ]
    ];
}
