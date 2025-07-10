namespace App\Controllers;

use App\Models\DiskonModel;

class Diskon extends BaseController
{
    protected $diskonModel;

    public function __construct()
    {
        $this->diskonModel = new DiskonModel();
    }

    public function index()
    {
        $data['diskon'] = $this->diskonModel->findAll();
        return view('diskon/index', $data);
    }

    public function create()
    {
        return view('diskon/create');
    }

    public function store()
    {
        if (!$this->validate($this->diskonModel->getValidationRules())) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->diskonModel->save([
            'tanggal' => $this->request->getPost('tanggal'),
            'nominal' => $this->request->getPost('nominal'),
        ]);

        return redirect()->to('/diskon')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $diskon = $this->diskonModel->find($id);
        return view('diskon/edit', ['diskon' => $diskon]);
    }

    public function update($id)
    {
        $nominal = $this->request->getPost('nominal');

        $this->diskonModel->update($id, ['nominal' => $nominal]);
        return redirect()->to('/diskon')->with('success', 'Data berhasil diupdate.');
    }

    public function delete($id)
    {
        $this->diskonModel->delete($id);
        return redirect()->to('/diskon')->with('success', 'Data berhasil dihapus.');
    }
}
