<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DashboardJasaCatering extends Controller
{
    public function index(): Response
    {
        return response()->view('dashboard.penjual.index');
    }

    public function addMenuView(): Response
    {
        return response()->view('dashboard.penjual.form-add-menu');
    }

    public function postAddMenu(request $request): RedirectResponse
    {
        $user = auth()->user();

        $request->validate([
            'name' => 'required|unique:menus,name', // Pastikan nama menu unik di tabel menus
            'price' => 'required|numeric|min:0', // Pastikan harga tidak negatif
            'min_order' => 'required|numeric|min:1', // Pastikan minimal order tidak negatif atau nol
            'category' => 'required|in:Makanan,Minuman',
            'description' => 'required',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'name.required' => 'Nama menu harus diisi.',
            'name.unique' => 'Nama menu sudah digunakan. Silakan gunakan nama lain.', // Pesan error untuk unique
            'price.required' => 'Harga harus diisi.',
            'price.numeric' => 'Harga harus berupa angka.',
            'price.min' => 'Harga tidak boleh negatif.',
            'min_order.required' => 'Minimal order harus diisi.',
            'min_order.numeric' => 'Minimal order harus berupa angka.',
            'min_order.min' => 'Minimal order tidak boleh kurang dari 1.',
            'category.required' => 'Kategori harus diisi.',
            'category.in' => 'Kategori harus berupa Makanan atau Minuman.',
            'description.required' => 'Deskripsi harus diisi.',
            'picture.required' => 'Gambar harus diupload.',
            'picture.image' => 'File harus berupa gambar.',
            'picture.mimes' => 'Gambar harus berformat jpeg, png, jpg, gif, atau svg.',
            'picture.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
        ]);

        try {
            $data = $request->all();
            $file = $request->file('picture');
            if ($file->isValid()) {
                $filePath = $file->store('foods/pictures', 'public');
                $data['picture'] = $filePath;
            } else {
                alert()->error('Error!','Gagal mengupload gambar');
                return back()->withErrors('Gagal mengupload gambar.');
            }
            $data['user_id'] = $user->id;
            Menu::create($data);

        } catch (\Throwable $th) {
            \Log::error('Error adding menu: ' . $th->getMessage());
            alert()->error('Error!','Terjadi kesalahan saat menambahkan menu');

            return back()->withErrors('Terjadi kesalahan saat menambahkan menu.');
        }

        alert()->success('Success!','Menu Added Successfully');

        return redirect()->route('dashboard.menu');
    }

    public function MenuView(): Response
    {
        $menus = Menu::query()
            ->orderBy('created_at', 'asc') // Urutkan berdasarkan tanggal terbaru
            ->paginate(4);
        return response()->view('dashboard.penjual.table-menu', compact('menus'));
    }

    public function setItemAsAvailableOrUnavailable(Menu $menu): RedirectResponse
    {
        if ($menu->status == 'Tersedia') {
            $menu->update(['status' => 'Tidak Tersedia']);
            alert()->success('Success!','Menu Unavailable Successfully');
        } else {
            $menu->update(['status' => 'Tersedia']);
            alert()->success('Success!','Menu Available Successfully');
        }
        return back();
    }

    public function profile(): Response
    {
        $user = User::findOrFail(auth()->user()->id);
        return response()->view('dashboard.penjual.profile', compact('user'));
    }

    public function postProfile(request $request): RedirectResponse
    {
        $user = User::findOrFail(auth()->user()->id);
        if (request()->has('avatar')) {
            $data = $request->all();
            $file = $request->file('avatar');
            $filePath = $file->store('avatars');
            $data['avatar'] = $filePath;
            $user->update($data);
            alert()->success('Success!','Profile Information Saved Successfully');
            return back();
        }
        $user->update($request->all());
        alert()->success('Success!','Profile Information Saved Successfully');
        return back();
    }

    public function order(): Response
    {
        return response()->view('dashboard.penjual.order');
    }

    public function widthdrawalForm()
    {
        return response()->view('dashboard.penjual.withdrawal-form');
    }

    public function widthdrawalHistory()
    {
        return response()->view('dashboard.penjual.withdrawal-history');
    }
}
