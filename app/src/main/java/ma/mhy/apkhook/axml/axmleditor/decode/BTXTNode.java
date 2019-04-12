package ma.mhy.apkhook.axml.axmleditor.decode;

import java.io.IOException;
import java.util.List;

public class BTXTNode extends BXMLNode implements IVisitable{
	private final int TAG = 0x00100104;
	private int mRawName;
	
	public void checkTag(int value) throws IOException{
		super.checkTag(TAG, value);
	}
	
	@Override
	@SuppressWarnings("unused")
	public void readStart(IntReader reader) throws IOException{
		super.readStart(reader);
		
		mRawName = reader.readInt();
		
		int skip0 = reader.readInt();
		int skip1 = reader.readInt();
	}

	@Override
	public void readEnd(IntReader reader) throws IOException{
	}
	
	@Override
	public void prepare(){
		
	}
	
	@Override
	public void writeStart(IntWriter writer) throws IOException{
		writer.writeInt(TAG);
		super.writeStart(writer);
		writer.writeInt(mRawName);
		
		writer.writeInt(0);//skiped
		writer.writeInt(0);//skiped
	}
	
	@Override
	public void writeEnd(IntWriter writer){
		
	}
	
	public int getName(){
		return mRawName;
	}
	
	@Override
	public boolean hasChild(){
		return false;
	}
	
	@Override
	public List<BXMLNode> getChildren(){
		throw new RuntimeException("Text node has no child");
	}
	
	@Override
	public void addChild(BXMLNode node){
		throw new RuntimeException("Can't add child to Text node");
	}
	
	@Override
	public void accept(IVisitor v) {
		v.visit(this);
	}

}
