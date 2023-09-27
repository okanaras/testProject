<?php

namespace App\Http\Controllers;

//burada request ve mail islemleri icin ilgili icerikleri ekledim
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\File;

// companies ve user adli kullandigim 2 modeli burada tanittim
use App\Models\Companies;
use App\Models\User;

class CompanyController extends Controller
{
    // veritabanindan verileri datatable a verilerimizi cektik
    public function index()
    {
        $company = Companies::all(); // burada tum verilerimizi cekip 'company' isimli degiskene atadim
        return view('admin.company.company-list', compact('company')); // admin/company/company-list view ini dondurup diger parametreyi ise view de degiskeni tanisin diye verdim
    }

    // ekleme islemini yapan arayuzu burada dondurdum
    public function create()
    {
        return view('admin.company.company-add');
    }

    // burada ekleme actioni olusturup request ile validation yaptim ve yukledigim logoyu almak icin gerekli yonlendirmeleri yaptim
    // ektra olarak yeni kayit olustugunda mail action ini hazirladim
    public function store(Request $request)
    {
        // validation
        $request->validate([
            'name' => 'required',
        ]);

        $company = new Companies;
        $company->name = $request->input('name');
        $company->address = $request->input('address');
        $company->phone = $request->input('phone');
        $company->email = $request->input('email');
        $company->web_site = $request->input('web_site');

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $extention = $file->getClientOriginalName();
            $filename = time() . '_' . $extention;
            $file->move('uploads/companies/', $filename); // $file->move(storage_path('uploads/companies/'), $filename);
            $company->logo = $filename;
        }

        $company->save();

        // mail action i islem icin ekledim Illuminate\Support\Facades\Mail;
        // 3 parametre aliyor; 1.donecek view, 2.compact ile veri gonderme, 3.mesaj fonksiyonu
        Mail::send(
            'admin.data.mail-info',
            compact('company'),
            function ($message) {
                $message->to('oknaras@icloud.com', 'Okan Aras')->subject('Company Created Subject');
            }
        );

        // son olarak islem tamamlandiginda ve eger basarili ise donecek kisim ve mesaj bilgisi buradaki succes degiskenini view de almak icin verdim
        return redirect()->route('company-list')->with('success', 'Sirket bilgisi basariyla eklendi ve bilgi maili adresinize gonderildi!');

    }


    // edit sayfasini goruntulemek icin kullandigim duzenlenecek id yi parametre alan metot
    public function edit(string $id)
    {
        // modelden veriyi sorguluyoruz
        $company = Companies::findOrFail($id);

        if ($company) {
            //eger kosul saglanirsa duzenle sayfasina yonlendiriyoruz
            return view('admin.company.company-edit', compact('company')); //compact ile view de verileri cekmek icin company degiskenini gonderiyoruz
        } else {
            return redirect()->route("company-list"); // eger id gelmezse liste sayfasina geri dondurulecek
        }
    }

    // update ve dogrulama isleminin yapildigi action
    public function update(string $id, Request $request)
    {
        // dogrulama islemi
        $request->validate([
            'name' => 'required',
        ]);

        $company = Companies::findOrFail($id);
        $company->name = $request->input('name');
        $company->address = $request->input('address');
        $company->phone = $request->input('phone');
        $company->email = $request->input('email');
        $company->web_site = $request->input('web_site');

        if ($request->hasFile('logo')) {
            $destination = 'uploads/companies/' . $company->logo;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('logo');
            $extention = $file->getClientOriginalName();
            $filename = time() . '_' . $extention;
            $file->move('uploads/companies/', $filename); // $file->move(storage_path('uploads/companies/'), $filename);
            $company->logo = $filename;
        }
        $company->update();

        // eger basarili ise dondurulen kisim ve burada post islemi oldugu icin 'id' yi de gonderiyoruz
        return redirect()->route('company-list', $id)->with('success', 'Sirket bilgisi basariyla guncellendi!');
    }

    // silme isleminin gerceklestigi kisim
    public function destroy(string $id)
    {
        // silinecek ogenin id sini cekiyorum
        $company = Companies::findOrFail($id);
        $destination = 'uploads/companies/' . $company->logo;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $company->delete(); // silme fonksiyounu uyguluyorum
        // islem tamamlandiginda ve eger basarili ise donecek kisim ve mesaj bilgisi buradaki succes degiskenini view de almak icin verdim
        return redirect()->route('company-list')->with('success', 'Sirket bilgisi basariyla silindi!');
    }

    // goruntuleme actionu 
    public function show(string $id)
    {
        // goruntulenecek ogenin id sini modelden cekip degiskene attim
        $company = Companies::findOrFail($id);
        if ($company) {
            //eger kosul saglanirsa info sayfasina yonlendirdim ve verilerini cekebilmek icin compact ile company degiskenini gonderdim
            return view('admin.company.company-show', compact('company'));
        } else {
            return redirect()->route('company-list'); // eger id gelmezse liste sayfasina geri dondurulecek
        }
    }

}