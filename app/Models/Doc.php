<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doc extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = ['id' => 'integer'];

    const Document_Type = [
        'draft' => 'Draft',
        'office' => 'Office',
        'public' => 'Public'
    ];

    const Document_Classification = [
        'cos' => 'Certificate of Service',
        'dv' => 'Disbursement Voucher',
        'iir' => 'Inventory and Inspection Report',
        'l' => 'Letter',
        'lr' => 'Liquidation Report',
        'memo' => 'Memorandum',
        'moa' => 'Memorandum of Agreement',
        'mr' => 'Memorandum Receipt',
        'ocd' => 'Official Cash Book',
        'pds' => 'Personal Data Sheet',
        'po' => 'Purchase Order',
        'pr' => 'Purchase Request',
        'rs' => 'Referral Slip',
        'roa' => 'Request for Obligation of Allotments',
        'riv' => 'Requisition and Issue Voucher',
        'u' => 'Unclassified',
        ];

    const Document_For = [
        'sign' => 'Signature',
        'act' => 'Appropriate Action',
        'endorse' => 'Endorsement/Recomendation',
        'file' => 'Filing/Keep',
        'return' => 'Return',
        'draft' => 'Draft',
    ];

    const Document_Status = [
        'origin' => 'Originated',
        'received' => 'Received',
        'released' => 'Released',
        'terminal' => 'Terminal',
    ];

    public function getAuthorFullnameAttribute(){
        return (User::find($this->author_id))->fullname ?? '(Unknown)';
    }

    public function getDocumentTypeAttribute(){
        return Doc::Document_Type[$this->for] ?? '(Unknown)';
    }

    public function getDocumentForAttribute(){
        return Doc::Document_For[$this->for] ?? '(Unknown)';
    }

    public function getDocumentStatusAttribute(){
        return Doc::Document_Status[$this->status] ?? '(Unknown)';
    }

    public function getDocumentClassAttribute(){
        return Doc::Document_Classification[$this->class] ?? '(Unknown)';
    }


    public function getUserFullnameAttribute(){
        return User::find($this->author_id) ? (User::find($this->author_id))->fullname : '(Unknown)';
    }

    public function getOfficeNameAttribute(){
        return Office::find($this->office_id) ? (Office::find($this->office_id))->name : '(Unknown)';
    }

    public function action_takens()
    {
        return $this->hasMany(ActionTaken::class);
    }

    public function audit_trails()
    {
        return $this->hasMany(AuditTrail::class);
    }

    public function images()
    {
        return $this->hasMany(DocImage::class);
    }

    public function tracks()
    {
        return $this->hasMany(DocTracking::class);
    }


    public function offices()
    {
        return $this->belongsToMany(Office::class,'doc_office');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'author_id')->through('office');
    }

    // Private variables


}



