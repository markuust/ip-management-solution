<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IpManagement;
use Inertia\Inertia;

class IpManagementController extends Controller
{
    // Display all ip addresses
    public function index()
    {
        $ipAddress = IpManagement::all();
        return Inertia::render('Posts/Index', ['ipAddresses' => $ipAddress]);
    }

    // Show form to create a new ip address record
    public function create()
    {
        return Inertia::render('Posts/Create');
    }

    // Store a new ip address
    public function store(Request $request)
    {
        $request->validate([
            'ip_address' => 'required|ip',
            'notes' => 'nullable|string',
        ]);

       // Create the new IP record in the database and store it in a variable
        $newIp = IpManagement::create($request->all());

        // Redirect with the new IP record using Inertia
        // return redirect()->route('posts.index')->with([
        //     'newIp' => $newIp
        // ]);

        return Inertia::render('Posts/Index', [
            'newIp' => $newIp,
        ]);
    }

    // Show form to edit ip address
    public function edit($id)
    {
        $ipAddress = IpManagement::findOrFail($id);
    
        return Inertia::render('Posts/Edit', [
            'ipAddress' => $ipAddress,
        ]);
    }

    // Update an existing ip address
    public function update(Request $request, $id)
    {
        $request->validate([
            'ip_address' => 'required|ip',
            'notes' => 'nullable|string',
        ]);

        $ipAddress = IpManagement::findOrFail($id);
        $ipAddress->update([
            'ip_address' => $request->input('ip_address'),
            'notes' => $request->input('notes'),
        ]);

        // return redirect()->route('posts.index')->with('success', 'IP Address updated successfully.');

        return Inertia::render('Posts/Index', [
            'NewIpAddress' => $ipAddress,
        ]);
    }

}
